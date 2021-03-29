<?php

class User
{
<<<<<<< HEAD:Models/User.php
    
    public function getUserById($id, $db){
        $sql = "SELECT * FROM user where id = :id";//Possible error
=======
    private $id;
    private $mos;
    private $rank;
    private $first_name;
    private $last_name;
    private $ssn;
    private $dod_id;
    private $dob;
    private $blood_type;
    private $address;

    public function __construct($id=null, $mos=null, $rank=null, $first_name=null, $last_name=null, $ssn=null, $dod_id=null,$dob=null,$blood_type=null,$address=null){
        $this->id = $id;
        $this->mos = $mos;
        $this->rank = $rank;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->ssn = $ssn;
        $this->dod_id = $dod_id;
        $this->dob = $dob;
        $this->blood_type = $blood_type;
        $this->address = $address;
    }
    //Getters
    public function getId() {
        return $this->id;
    }
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
    public function getDodId() {
        return $this->dod_id;
    }
    public function getDob() {
        return $this->dob;
    }
    public function getBloodType() {
        return $this->blood_type;
    }
    public function getAddress() {
        return $this->address;
    }

    public static function getPersonnelById($id, $db){
        $sql = "SELECT * FROM user where id = :personnel_id";//Possible error
>>>>>>> e49a41de6bd3fbc7d6731de99a3ef19ad4b5d33f:Models/Soldier.php
        $pst = $db->prepare($sql);
        $pst->bindParam(':user_id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }
<<<<<<< HEAD:Models/User.php
    public function getAllUsers($dbcon){
=======
    public function getAllPersonnels($dbcon){
>>>>>>> e49a41de6bd3fbc7d6731de99a3ef19ad4b5d33f:Models/Soldier.php
        $sql = "SELECT * FROM user";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $users = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $users;
    }
    public function addUser($mos, $rank, $first_name, $last_name, $ssn, $dod_id,$dob,$blood_type,$address,$db)
    {
        $sql = "INSERT INTO user (mos, rank, first_name, last_name, ssn, dod_id,dob,blood_type,address) 
              VALUES (:model, :year, :make) ";
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

        $count = $pst->execute();
        return $count;
    }
<<<<<<< HEAD:Models/User.php
    public function deleteUser($id, $db){
=======
    public function deletePersonnel($id, $db){
>>>>>>> e49a41de6bd3fbc7d6731de99a3ef19ad4b5d33f:Models/Soldier.php
        $sql = "DELETE FROM user WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
<<<<<<< HEAD:Models/User.php
    public function updateUser($id,$mos, $rank, $first_name, $last_name, $ssn, $dod_id,$dob,$blood_type,$address){
=======
    public static function updatePersonnel(Personnel $soldier,$db) {
        $id = $soldier->getId();
        $mos = $soldier->getMos();
        $rank = $soldier->getRank();
        $first_name = $soldier->getFname();
        $last_name = $soldier->getLname();
        $ssn = $soldier->getSsn();
        $dod_id = $soldier->getDodId();
        $dob = $soldier->getDob();
        $blood_type = $soldier->getBloodType();
        $address = $soldier->getAddress();

>>>>>>> e49a41de6bd3fbc7d6731de99a3ef19ad4b5d33f:Models/Soldier.php
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
<<<<<<< HEAD:Models/User.php
                WHERE id = :id";
=======
                WHERE id = :personnel_id";
        $pst =  $db->prepare($sql);

>>>>>>> e49a41de6bd3fbc7d6731de99a3ef19ad4b5d33f:Models/Soldier.php
        $pst->bindParam(':mos', $mos);
        $pst->bindParam(':rank', $rank);
        $pst->bindParam(':first_name', $first_name);
        $pst->bindParam(':last_name', $last_name);
        $pst->bindParam(':ssn', $ssn);
        $pst->bindParam(':dod_id', $dod_id);
        $pst->bindParam(':dob', $dob);
        $pst->bindParam(':blood_type', $blood_type);
        $pst->bindParam(':address', $address);
<<<<<<< HEAD:Models/User.php
=======
        $pst->bindParam(':personnel_id', $id);

>>>>>>> e49a41de6bd3fbc7d6731de99a3ef19ad4b5d33f:Models/Soldier.php
        $count = $pst->execute();
        return $count;
    }
}