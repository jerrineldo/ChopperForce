<?php
class Award
{
    public function getUsers($db){
        $query = "SELECT *  FROM user";//DOUBLECHECK NAME
        $pdostm = $db->prepare($query);
        $pdostm->execute();
        $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
    public function getAwardsByUser($db, $user){
        $query = "SELECT * FROM awards_report_page WHERE user= :user";
        $pdostm = $db->prepare($query);
        $pdostm->bindValue(':make', $user, \PDO::PARAM_STR);
        $pdostm->execute();
        $s = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $s;
    }
    public function getAwardsById($id, $db){
        $sql = "SELECT * FROM awards INNER JOIN user ON user.id = awards.user_id where awards.id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }
    public function getAllAwards($dbcon){
        $sql = "SELECT CONCAT(user.first_name,' ',user.last_name) as Username, awards.id,user_id,awards.recommender
        ,awards.award,awards.reason,awards.present,awards.days,awards.remarks FROM awards, user where user.id = awards.user_id";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $cars = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $cars;
    }
    public function addAward( $user_id,$recommender,$award,$reason,$present,$days,$remarks,$db)
    {
        $sql = "INSERT INTO awards (user_id, recommender, award,reason,present,days,remarks) 
              VALUES (:user_id, :recommender, :award,:reason,:present,:days,:remarks) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':user_id', $user_id);
        $pst->bindParam(':recommender', $recommender);
        $pst->bindParam(':award', $award);
        $pst->bindParam(':reason', $reason);
        $pst->bindParam(':present', $present);
        $pst->bindParam(':days', $days);
        $pst->bindParam(':remarks', $remarks);

        $count = $pst->execute();
        return $count;
    }
    public function deleteAward($id, $db){
        $sql = "DELETE FROM awards WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
    public function updateAward($id,$user_id,$recommender,$award,$reason,$present,$days,$remarks,$db){
        $sql = "Update awards
                set 
                user_id = :user_id,
                recommender = :recommender,
                award = :award,
                reason = :reason,
                present = :present,
                days = :days,
                remarks = :remarks
                WHERE id = :id";
        $pst =  $db->prepare($sql);
        $pst->bindParam(':user_id', $user_id);
        $pst->bindParam(':recommender', $recommender);
        $pst->bindParam(':award', $award);
        $pst->bindParam(':reason', $reason);
        $pst->bindParam(':present', $present);
        $pst->bindParam(':days', $days);
        $pst->bindParam(':remarks', $remarks);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        return $count;
    }
}