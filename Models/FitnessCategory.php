<?php

class FitnessCategory
{

    private $id;
    private $category;

    public function GetAllCategories($db){

        $sql = "SELECT * FROM soldier_physical_fitnesscategories";
        $pdostm = $db->prepare($sql);
        $pdostm->execute();
        $users = $pdostm->fetchAll(\PDO::FETCH_OBJ);
        return $users;

    }

}


?>