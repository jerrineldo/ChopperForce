<?php
    class Weapon{
        public function getAllWeapons($db){
            $sql = "SELECT * FROM weapons_categories";
            $pdostm = $db->prepare($sql);
            $pdostm->execute();
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }
        public function searchWeapons($db, $weaponName){
            $sql = "SELECT * FROM weapons_categories WHERE LOWER((weapon_name) LIKE :weaponName)";
            $pdostm = $db->prepare($sql);
            $searchKey = "%".strtolower($weaponName)."%";
            $pdostm->bindParam(':weaponName', $searchKey);
            $pdostm->execute();
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }
        public function deleteWeapon($db, $id){
            $sql = "DELETE FROM weapons_categories WHERE id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $count = $pst->execute();
            return $count;
        }
    }
?>