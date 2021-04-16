<?php

class User
{
    
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
    //Journeys method for summing users by rank
    public function getAllUsesByRank($dbcon){
        $sql = "SELECT rank, COUNT(id) as NumberofSoldiersByRank  FROM `user` 
        group by `rank` ";
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
    public function deleteUser($id, $db){
        $sql = "DELETE FROM user WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
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
        $count = $pst->execute();
        return $count;
    }
}