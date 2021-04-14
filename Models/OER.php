<?php
/*namespace ChopperForceFive\Models;*/
class Oer
{
    //user tables: First Name, Last Name, Rank
    public function getAllOers($db){
        $sql = "SELECT oc.id, user_id, u.rank, u.first_name , u.last_name, 
                oc.rater, oc.int_rater, oc.senior_rater, oc.last_oer, oc.thru_date, oc.due, oc.type, oc.remarks 
                FROM officer_reportcards as oc
                JOIN `user` u ON oc.user_id  = u.id";

        $pdostm = $db->prepare($sql);
        $pdostm->execute();
        $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
//Journeys method for getting upcoming OER DATES
public function getAllUpcommingOers($db){
    $sql = "SELECT oc.id, user_id, u.rank, u.first_name , u.last_name, 
            oc.rater, oc.int_rater, oc.senior_rater, oc.last_oer, oc.thru_date, oc.due, oc.type, oc.remarks 
            FROM officer_reportcards as oc
            JOIN `user` u ON oc.user_id  = u.id
            WHERE (due <= DATE_ADD(NOW(), INTERVAL 1 MONTH)) and(due >= NOW()) ";

    $pdostm = $db->prepare($sql);
    $pdostm->execute();
    $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
    return $results;
}



    public function getOneMonthOers($db){
        $sql = "SELECT oc.id, user_id, u.rank, u.first_name , u.last_name, 
                oc.rater, oc.int_rater, oc.senior_rater, oc.last_oer, oc.thru_date, oc.due, oc.type, oc.remarks 
                FROM officer_reportcards as oc
                JOIN `user` u ON oc.user_id  = u.id
                WHERE";

        $pdostm = $db->prepare($sql);
        $pdostm->execute();
        $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }


    public function getOerById($id, $dbcon){
        $sql = "SELECT * FROM officer_reportcards where id = :id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }


    public function addOer($user_id, $rater, $int_rater, $senior_rater, $last_oer, $thru_date, $due, $type, $remarks, $dbcon)
    {
        $sql = "INSERT INTO officer_reportcards (user_id, rater, int_rater, senior_rater, last_oer, thru_date, due, type, remarks )
             VALUES (:user_id, :rater, :int_rater, :senior_rater, :last_oer, :thru_date, :due, :type, :remarks) ";

        $pst = $dbcon->prepare($sql);



        $pst->bindParam(':user_id', $user_id);
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

    public function deleteOer($id, $con){
        $sql = "DELETE FROM officer_reportcards WHERE id = :id";
        $pst = $con->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }

    public function updateOer($id, $user_id, $rank, $first_name, $last_name,$rater, $int_rater, $senior_rater,
                              $last_oer, $thru_date, $due, $type, $remarks, $dbcon){

        $sql = "Update officer_reportcards
               set
               user_id = :user_id,
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


        $pst->bindParam(':user_id', $user_id);
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