<?php
namespace ChopperForceFive\Models;
class Oer
{
    /*public function getSoldierFirstName($db){
        $query = "SELECT DISTINCT first_name FROM users";
        $pdostm = $db->prepare($query);
        $pdostm->execute();

        //fetch all result
        $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
    public function getCarsInMake($db, $make){
        $query = "SELECT * FROM cars WHERE make= :make";
        $pdostm = $db->prepare($query);
        $pdostm->bindValue(':make', $make, \PDO::PARAM_STR);
        $pdostm->execute();
        $s = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $s;
    }*/
    public function getOerById($id, $db){
        $sql = "SELECT * FROM officer_reportcards where id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }
    public function getAllOers($dbcon){
        $sql = "SELECT * FROM officer_reportcards";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();

        $oers = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $oers;
    }

    public function addOer($id, $user_id, $rank, $rater, $int_rater, $senior_rater, $last_oer, $thru_date, $due, $type, $remarks)
    {
        $sql = "INSERT INTO officer_reportcards (id, user_id, rank, rater, int_rater, senior_rater, last_oer, thru_date, due, type, remarks )
             VALUES (:id, :user_id, :rank, :rater, :int_rater, :senior_rater, :last_oer, :thru_date, :due, :type, :remarks) ";

        $pst = $db->prepare($sql);


        $pst->bindParam(':id', $id);
        $pst->bindParam(':user_id', $user_id);
        $pst->bindParam(':rank', $rank);
        $pst->bindParam(':rater', $rater);
        $pst->bindParam(':int_rater', $int_rater);
        $pst->bindParam(':senior_rater', $senior_rater);
        $pst->bindParam(':last_oer', $last_oer);
        $pst->bindParam(':thru_date', $thru_date);
        $pst->bindParam(':due', $due);
        $pst->bindParam(':type', $type);
        $pst->bindParam(':remarks', $remarks);


        $count = $pst->execute();
        return $count;
    }

    public function deleteOer($id, $db){
        $sql = "DELETE FROM officer_reportcards WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;

    }

    public function updateOer($id, $user_id, $rank, $rater, $int_rater, $senior_rater,
                              $last_oer, $thru_date, $due, $type, $remarks){

        $sql = "Update officer_reportcards
               set
               id = :id,
               user_id = :user_id,
               rank = :rank,
               rater = :rater,
               int_rater = :int_rater,
               senior_rater = :senior_rater,
               last_oer = :last_oer,
               thru_date = :thru_date,
               due = :due,
               type = :type,
               remarks = :remarks,
               WHERE id = :id";

        $pst = $db->prepare($sql);

        $pst->bindParam(':id', $id);
        $pst->bindParam(':user_id', $user_id);
        $pst->bindParam(':rank', $rank);
        $pst->bindParam(':rater', $rater);
        $pst->bindParam(':int_rater', $int_rater);
        $pst->bindParam(':senior_rater', $senior_rater);
        $pst->bindParam(':last_oer', $last_oer);
        $pst->bindParam(':thru_date', $thru_date);
        $pst->bindParam(':due', $due);
        $pst->bindParam(':type', $type);
        $pst->bindParam(':remarks', $remarks);

        $count = $pst->execute();
        return $count;

    }
}