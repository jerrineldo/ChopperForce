<?php
    class FamilyContact
    {
        public function getAllFamilyContacts($db){
            $sql = "SELECT fc.id, userId, CONCAT(fc.first_name, ' ' ,fc.last_name) AS 'member_name', fc.relationship, fc.phone, fc.email, fc.address, fc.preference_form, fc.physical_location, CONCAT(u.last_name, ' ', u.first_name) AS 'full_name', u.`rank` 
            FROM family_contacts as fc
            JOIN `user` u ON fc.userId  = u.id";
            $pdostm = $db->prepare($sql);
            $pdostm->execute();
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }

        public function getFamilyContactByID($db, $id){
            $query = "SELECT * FROM family_contacts WHERE id= :id";
            $pst  = $db->prepare($query);
            $pst ->bindParam(':id', $id);
            $pst ->execute();
            return $pst->fetch(PDO::FETCH_OBJ);
        }

        public function removeFamilyContacts($db, $id){
            $sql = "DELETE FROM family_contacts WHERE id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $count = $pst->execute();
            return $count;
        }

        public function addFamilyContact($db, $first_name, $last_name, $relationship, $phone, $email, $address, $preference_form, $physical_location){
            $sql = "INSERT INTO family_contacts 
            (first_name, last_name, relationship, phone, email, address, preference_form, physical_location) 
            VALUES (:first_name, :last_name, :relationship, :phone, :email, :address, :preference_form, :physical_location)";
            
            $pst = $db->prepare($sql);
            $pst->bindParam(':first_name', $first_name);
            $pst->bindParam(':last_name', $last_name);
            $pst->bindParam(':relationship', $relationship);
            $pst->bindParam(':phone', $phone);
            $pst->bindParam(':email', $email);
            $pst->bindParam(':address', $address);
            $pst->bindParam(':preference_form', $preference_form);
            $pst->bindParam(':physical_location', $physical_location);

            $count = $pst->execute();

            return $count;   
        }

        public function updateFamilyContacts($db, $id, $first_name, $last_name, $relationship, $phone, $email, $address, $preference_form, $physical_location){
            $sql = "UPDATE family_contacts 
                SET first_name = :first_name,
                last_name = :last_name,
                phone = :phone,
                relationship = :relationship,
                email = :email,
                address = :address,
                preference_form = :preference_form,
                physical_location = :physical_location
                WHERE id = :id
            ";

            $pst = $db->prepare($sql);

            $pst->bindParam(':first_name', $first_name);
            $pst->bindParam(':last_name', $last_name);
            $pst->bindParam(':relationship', $relationship);
            $pst->bindParam(':phone', $phone);
            $pst->bindParam(':email', $email);
            $pst->bindParam(':address', $address);
            $pst->bindParam(':preference_form', $preference_form);
            $pst->bindParam(':physical_location', $physical_location);
            $pst->bindParam(':id', $id);

            $count = $pst->execute();

            return $count;   
        }

        public function searchFamilyContacts($db, $name){
            $sql = "SELECT fc.id, userId, CONCAT(fc.first_name, ' ' ,fc.last_name) AS 'full_name', fc.relationship, fc.phone, fc.email, fc.address, fc.preference_form, fc.physical_location, CONCAT(u.last_name, ' ', u.first_name) AS 'member_name', u.`rank` 
            FROM family_contacts as fc
            JOIN `user` u ON fc.userId  = u.id
            WHERE LOWER((CONCAT(fc.first_name, ' ' ,fc.last_name)) LIKE :fullname) OR LOWER((CONCAT(u.first_name, ' ' ,u.last_name)) LIKE :fullname)";
            $pdostm = $db->prepare($sql);
            $searchKey = "%".strtolower($name)."%";
            $pdostm->bindParam(':fullname', $searchKey);
            $pdostm->execute();
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }
    }
?>