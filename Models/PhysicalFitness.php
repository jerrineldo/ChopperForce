<?php

    class FitnessReport
    {
        private $rank;
        private $first_name;
        private $last_name;
        private $dob;
        private $mdl;
        private $spt;
        private $hrp;
        private $sdc;
        private $ltk;
        private $mr;
        private $total;
        private $fitnesscategory;

        public function __construct($rank = null, $first_name = null,$last_name = null,$dob = null,$mdl = null,
        $spt = null,$hrp = null , $sdc = null, $ltk = null, $mr = null, $total = null, $fitnesscategory = null)
        {
            $this->rank = $rank;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->dob = $dob;
            $this->mdl = $mdl;
            $this->spt = $spt;
            $this->hrp = $hrp;
            $this->sdc = $sdc;
            $this->ltk = $ltk;
            $this->mr  = $mr;
            $this->total = $total;
            $this->fitnesscategory = $fitnesscategory;

        }

        public function getRank() {
            return $this->rank;
        }
        public function getFname() {
            return $this->first_name;
        }
        public function getLname() {
            return $this->last_name;
        }
        public function getDob() {
            return $this->dob;
        }
        public function getmdl() {
            return $this->mdl;
        }
        public function getspt() {
            return $this->spt;
        }
        public function gethrp() {
            return $this->hrp;
        }
        public function getsdc() {
            return $this->hrp;
        }
        public function getltk() {
            return $this->ltk;
        }
        public function getmr() {
            return $this->mr;
        }
        public function getTotal() {
            return $this->total;
        }
        public function getFitnessCategory() {
            return $this->fitnesscategory;
        }

        public function GenerateFitnessReport($db){
            $sql = "select * from soldier_physical_fitness pf
            JOIN user u
            ON pf.id = u.id 
            Join soldier_physical_fitnesscategories spf 
            ON spf.category_id = pf.physical_fitness_categories_id 
            ";
            $pdostm = $db->prepare($sql);
            $pdostm->execute();
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }

        public static function getFitnessReportById($id, $db){
            $sql = "select * from soldier_physical_fitness pf
            JOIN user u
            ON pf.id = u.id 
            Join soldier_physical_fitnesscategories spf 
            ON spf.category_id = pf.physical_fitness_categories_id where u.id = :personnel_id";//Possible error
            $pst = $db->prepare($sql);
            $pst->bindParam(':personnel_id', $id);
            $pst->execute();
            return $pst->fetch(\PDO::FETCH_OBJ);
        }

        public static function updateFitnessReport(FitnessReport $fitnessreport,$db) {

            $rank = $fitnessreport->getRank();
            $first_name = $fitnessreport->getFname();
            $last_name = $fitnessreport->getLname();
            $dob = $fitnessreport->getDob();

        }

    }



?>