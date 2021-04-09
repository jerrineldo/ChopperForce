<?php
/*namespace ChopperForceFive\Models;*/
class Ncoer
{
    //user tables: First Name, Last Name, Rank
    public function getAllNcoers($db){
        $sql = "SELECT eoc.id, user_id, u.rank, u.first_name , u.last_name, 
                eoc.rater, eoc.senior_rater, eoc.reviewer, eoc.last_ncoer, eoc.thru_date, eoc.due, eoc.type, eoc.remarks 
                FROM enlisted_reportcards as eoc
                JOIN `user` u ON eoc.user_id  = u.id";

        $pdostm = $db->prepare($sql);
        $pdostm->execute();
        $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }


    public function getNcoerById($id, $dbcon){
        $sql = "SELECT * FROM enlisted_reportcards where id = :id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }


    public function addNcoer($user_id, $rater, $senior_rater, $reviewer, $last_ncoer, $thru_date, $due, $type, $remarks, $dbcon)
    {
        $sql = "INSERT INTO enlisted_reportcards (user_id, rater, senior_rater, reviewer, last_ncoer, thru_date, due, type, remarks )
             VALUES (:user_id, :rater, :senior_rater, :reviewer, :last_ncoer, :thru_date, :due, :type, :remarks) ";

        $pst = $dbcon->prepare($sql);



        $pst->bindParam(':user_id', $user_id);
        $pst->bindParam(':rater', $rater);
        $pst->bindParam(':senior_rater', $senior_rater);
        $pst->bindParam(':reviewer', $reviewer);
        $pst->bindParam(':last_ncoer', $last_ncoer);
        $pst->bindParam(':thru_date', $thru_date);
        $pst->bindParam(':due', $due);
        $pst->bindParam(':type', $type);
        $pst->bindParam(':remarks', $remarks);


        $count = $pst->execute();
        return $count;
    }

    public function deleteNcoer($id, $con){
        $sql = "DELETE FROM enlisted_reportcards WHERE id = :id";
        $pst = $con->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }

    public function updateNcoer($user_id, $rater, $senior_rater, $reviewer, $last_ncoer, $thru_date, $due, $type, $remarks, $dbcon){

        $sql = "Update enlisted_reportcards
               set
               user_id = :user_id,
               rater = :rater,
               senior_rater = :senior_rater,
               reviewer = :reviewer,
               last_ncoer = :last_ncoer,
               thru_date = :thru_date,
               due = :due,
               type = :type,
               remarks = :remarks,
               WHERE id = :id";

        $pst = $db->prepare($sql);


        $pst->bindParam(':user_id', $user_id);
        $pst->bindParam(':rater', $rater);
        $pst->bindParam(':senior_rater', $senior_rater);
        $pst->bindParam(':reviewer', $reviewer);
        $pst->bindParam(':last_ncoer', $last_ncoer);
        $pst->bindParam(':thru_date', $thru_date);
        $pst->bindParam(':due', $due);
        $pst->bindParam(':type', $type);
        $pst->bindParam(':remarks', $remarks);

        $count = $pst->execute();
        return $count;

    }
}