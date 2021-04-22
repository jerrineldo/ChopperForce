<?php

class User
{
    private $mos;
    private $rank;
    private $first_name;
    private $last_name;
    private $ssn;
    private $dod_id;
    private $dob;
    private $blood_type;
    private $address;
    
    public function __construct(
                                    $mos = null, 
                                    $rank = null,
                                    $first_name = null,
                                    $last_name = null,
                                    $ssn = null,
                                    $dod_id = null,
                                    $dob = null,
                                    $blood_type = null, 
                                    $address = null
                                ) 
    {
        $this->mos  = $mos;
        $this->rank = $rank;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->ssn = $ssn;
        $this->dod_id = $dod_id;
        $this->dob = $dob;
        $this->blood_type = $blood_type;
        $this->address = $address;
    }//end if constructor

    public function getMos() {
        return $this->mos;
    }
    public function getRank() {
        return $this->rank;
    }
    public function getFname() {
        return $this->first_name;
    }
    public function getLname() {
        return $this->last_name;
    }
    public function getSsn() {
        return $this->ssn;
    }
    public function getdod_id() {
        return $this->dod_id;
    }
    public function getDob() {
        return $this->dob;
    }
    public function getBloodtype() {
        return $this->blood_type;
    }
    public function getAddress() {
        return $this->address;
    }

    public function getUserById($id, $db){
        $sql = "SELECT * FROM user where id = :id";//Possible error
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }
    public function getAllUsers($dbcon){
        $sql = "SELECT * FROM user";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $users = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $users;
    }
    public function getPotentialUsers($dbcon){
        $sql = "SELECT u.id,u.first_name, u.last_name 
                    FROM user u
                LEFT OUTER JOIN soldier_physical_fitness pf
                    on u.id = pf.User_Id
                WHERE pf.User_Id IS NULL";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $users = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $users;
    }
    
    //Journeys method for summing users by rank
    public function getAllUsesByRank($dbcon){
        $sql = "SELECT rank, COUNT(id) as NumberofSoldiersByRank  FROM `user` 
        group by `rank` ";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $users = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $users;
    }

    //function to add a new user to the database
    public function addUser($db)
    {
        $sql = "INSERT INTO user (mos, rank, first_name, last_name, ssn, dod_id, dob, blood_type, address) 
                    VALUES (:mos, :rank, :first_name, :last_name, :ssn, :dod_id, :dob, :blood_type, :address)";
        $pst = $db->prepare($sql);

        $mos =  $this->getMos();
        $rank = $this->getRank();
        $first_name = $this->getFname();
        $last_name = $this->getLname();
        $ssn = $this->getSsn();
        $dod_id = $this->getdod_id();
        $dob = $this->getDob();
        $blood_type = $this->getBloodtype();
        $address = $this->getAddress();

        $pst->bindParam(':mos',$mos);
        $pst->bindParam(':rank', $rank);
        $pst->bindParam(':first_name', $first_name);
        $pst->bindParam(':last_name', $last_name);
        $pst->bindParam(':ssn', $ssn);
        $pst->bindParam(':dod_id', $dod_id);
        $pst->bindParam(':dob', $dob);
        $pst->bindParam(':blood_type', $blood_type);
        $pst->bindParam(':address', $address);

        $count = $pst->execute();
        return $count;
    }

    public function deleteUser($id, $db){
        $sql = "DELETE FROM user WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }

    //function to update the details of a soldier/user.
    public function updateUser($id,$mos, $rank, $first_name, $last_name, $ssn, $dod_id,$dob,$blood_type,$address,$db){
        $sql = "Update user
                set 
                mos = :mos,
                rank = :rank,
                first_name = :first_name,
                last_name = :last_name,
                ssn = :ssn,
                dod_id = :dod_id,
                dob = :dob,
                blood_type = :blood_type,
                address = :address
                WHERE id = :id";

        $pst = $db->prepare($sql);
        
        $pst->bindParam(':mos', $mos);
        $pst->bindParam(':rank', $rank);
        $pst->bindParam(':first_name', $first_name);
        $pst->bindParam(':last_name', $last_name);
        $pst->bindParam(':ssn', $ssn);
        $pst->bindParam(':dod_id', $dod_id);
        $pst->bindParam(':dob', $dob);
        $pst->bindParam(':blood_type', $blood_type);
        $pst->bindParam(':address', $address);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }

    public function getAllUsersID($dbcon){
        $sql = "SELECT id FROM user";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $users = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $users;
    }
}