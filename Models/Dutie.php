<?php
class Dutie
{
    public function getAllDuties($dbcon){
        $sql = "SELECT * FROM qualifications_duty_categories";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $cars = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $cars;
    }
    public function addDutie( $qualifications_category_name,$db)
    {
        $sql = "INSERT INTO qualifications_duty_categories (qualifications_category_name ) 
              VALUES (:qualifications_category_name ) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':qualifications_category_name', $qualifications_category_name);
    

        $count = $pst->execute();
        return $count;
    }
    public function deleteDutie($id, $db){
        $sql = "DELETE FROM qualifications_duty_categories WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
    public function updateDutie($id,$qualifications_category_name,$db){
        $sql = "Update qualifications_duty_categories
                set 
                qualifications_category_name = :qualifications_category_name
                WHERE id = :id";
        $pst =  $db->prepare($sql);
        $pst->bindParam(':qualifications_category_name', $qualifications_category_name);

        $count = $pst->execute();
        return $count;
    }
    public function getDutieById($id, $db){
        $sql = "SELECT * FROM qualifications_duty_categories  where id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }
}
?>