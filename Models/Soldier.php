<?php

class Personnel
{
    
    public function getPersonnelById($id, $db){
        $sql = "SELECT * FROM user where id = :personnel_id";//Possible error
        $pst = $db->prepare($sql);
        $pst->bindParam(':personnel_id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }
    public function getAllPersonnels($dbcon){
        $sql = "SELECT * FROM user";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $personnels = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $personnels;
    }
    public function addPersonnel($mos, $rank, $first_name, $last_name, $ssn, $dod_id,$dob,$blood_type,$address,$db)
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
    public function deletePersonnel($id, $db){
        $sql = "DELETE FROM user WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
    public function updatePersonnel($id,$mos, $rank, $first_name, $last_name, $ssn, $dod_id,$dob,$blood_type,$address){
        $sql = "Update user
                set 
                mos = :mos,
                rank = :rank,
                first_name = :first_name
                last_name = :last_name,
                ssn = :ssn
                dod_id = :dod_id,
                dob = :dob
                blood_type = :blood_type,
                address = :address
                WHERE id = :personnel_id";
        $pst =  $db->prepare($sql);
        $pst->bindParam(':make', $make);
        $pst->bindParam(':model', $model);
        $pst->bindParam(':year', $year);
        $pst->bindParam(':personnel_id', $id);
        $count = $pst->execute();
        return $count;
    }
}