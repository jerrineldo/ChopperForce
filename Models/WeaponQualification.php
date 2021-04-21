<?php
    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);
    class WeaponQualification{
        public function getAllWeaponQualification($db, $weaponId){
            $sql = "SELECT wq.id, wq.user_id, u.rank, wc.weapon_name, CONCAT(u.first_name, ' ', u.last_name) AS 'full_name',  wq.weapon_id, wq.qualification, wq.date, wq.hits, wq.next_date
            FROM weapons_qualifications as wq
            JOIN `user` u ON wq.user_id  = u.id
            JOIN `weapons_categories` wc ON wq.weapon_id  = wc.id
            WHERE wq.weapon_id = :weaponId";

            $pdostm = $db->prepare($sql);
            $pdostm->bindParam(':weaponId', $weaponId);
            $pdostm->execute();
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }

        public function getAllWeaponQualificationById($db, $qualificationId){
            $sql = "SELECT wq.id, wq.qualification, wq.date, wq.hits, wq.next_date
            FROM weapons_qualifications as wq
            WHERE wq.id = :qualificationId";

            $pst  = $db->prepare($sql);
            $pst ->bindParam(':qualificationId', $qualificationId);
            $pst ->execute();
            return $pst->fetch(PDO::FETCH_OBJ);
        }

        public function deleteWeaponQualification($db, $id){
            $sql = "DELETE FROM weapons_qualifications WHERE id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $count = $pst->execute();
            return $count;
        }

        public function updateWeaponQualification($db, $id, $date, $nextDate, $hits, $qualification){
            $sql = "UPDATE weapons_qualifications 
                    SET `date` = :date,
                    next_date = :nextDate,
                    hits = :hits,
                    qualification = :qualification
                    WHERE id = :id";

            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $pst->bindParam(':date', $date);
            $pst->bindParam(':nextDate', $nextDate);
            $pst->bindParam(':hits', $hits);
            $pst->bindParam(':qualification', $qualification);
            $count = $pst->execute();
            return $count;
        }

        public function searchWeaponQualification($db, $id, $name){
            $sql =  "SELECT wq.id, wq.user_id, 
                CONCAT(first_name, ' ' ,last_name) AS 'Full Name', 
                wq.weapon_id, 
                wq.qualification, 
                wq.date, 
                wq.hits, 
                wq.next_date 
                FROM weapons_qualifications as wq
                JOIN `user` u ON wq.user_id  = u.id
                WHERE wq.weapon_id = :id AND LOWER((CONCAT(first_name, ' ' ,last_name)) LIKE :fullname)";

            $pdostm = $db->prepare($sql);
            $searchKey = "%".strtolower($name)."%";
            $pdostm->bindParam(':fullname', $searchKey);
            $pdostm->execute();
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }
    }
?>