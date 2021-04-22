<?php
    class EmergencyContact
    {
        public function getAllEmergencyContact($db){
            $sql = 'SELECT ec.id AS "id",  u.rank, CONCAT(u.first_name, " " ,u.last_name) AS "full_name", CONCAT(ec.first_name, " " ,ec.last_name, ", ",ec.initial) AS "contact_name", phone, email
            FROM emergency_contact as ec
            JOIN `user` u ON ec.user_Id  = u.id';
            $pdostm = $db->prepare($sql);
            $pdostm->execute();
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }

        public function getEmergencyContactByID($db, $id){
            $query = "SELECT * FROM emergency_contact WHERE id= :id";
            $pst  = $db->prepare($query);
            $pst ->bindParam(':id', $id);
            $pst ->execute();
            return $pst->fetch(PDO::FETCH_OBJ);
        }

        public function removeEmergencyContactByID($db, $id){
            $sql = "DELETE FROM emergency_contact WHERE id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $count = $pst->execute();
            return $count;
        }

        public function addEmergencyContactByID($db, $userId, $initial, $firstName, $lastName, $phone, $email){
            $sql = "INSERT INTO emergency_contact 
            (user_id, initial, first_name, last_name, phone, email) 
            VALUES (:userId, :initial, :firstName, :lastName, :phone, :email)";
            
            $pst = $db->prepare($sql);
            $pst->bindParam(':userId', $userId);
            $pst->bindParam(':initial', $initial);
            $pst->bindParam(':firstName', $firstName);
            $pst->bindParam(':lastName', $lastName);
            $pst->bindParam(':phone', $phone);
            $pst->bindParam(':email', $email);

            $count = $pst->execute();

            return $count;   
        }

        public function updateEmergencyContactByID($db, $id, $initial, $firstName, $lastName, $phone, $email){
            $sql = "UPDATE emergency_contact 
                SET initial = :initial,
                first_name = :firstName,
                last_name = :lastName,
                phone = :phone,
                email = :email
                WHERE id = :id
            ";

            $pst = $db->prepare($sql);

            $pst->bindParam(':initial', $initial);
            $pst->bindParam(':firstName', $firstName);
            $pst->bindParam(':lastName', $lastName);
            $pst->bindParam(':phone', $phone);
            $pst->bindParam(':email', $email);
            $pst->bindParam(':id', $id);

            $count = $pst->execute();

            return $count;   
        }

        public function searchEmergencyContact($db, $name){
            $sql = "SELECT ec.id, user_Id, CONCAT(u.first_name, ' ' ,u.last_name) AS 'full_name', ec.phone, ec.email, CONCAT(ec.first_name, ' ' ,ec.last_name, ', ',ec.initial) AS 'contact_name', u.`rank` 
            FROM emergency_contact as ec
            JOIN `user` u ON ec.user_Id  = u.id
            WHERE LOWER((CONCAT(ec.first_name, ' ' ,ec.last_name, ', ',ec.initial)) LIKE :fullname) OR LOWER((CONCAT(u.first_name, ' ' ,u.last_name)) LIKE :fullname)";

            $pdostm = $db->prepare($sql);
            $searchKey = "%".strtolower($name)."%";
            $pdostm->bindParam(':fullname', $searchKey);
            $pdostm->execute();
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }
    }
?>