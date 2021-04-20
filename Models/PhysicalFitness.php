<?php

    class FitnessReport
    {
        private $id;
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
        private $fitness_category;
        private $user_id;

        public function __construct(
                                        $id = null, 
                                        $rank = null,
                                        $first_name = null,
                                        $last_name = null,
                                        $dob = null,
                                        $mdl = null,
                                        $spt = null,
                                        $hrp = null, 
                                        $sdc = null, 
                                        $ltk = null, 
                                        $mr = null,
                                        $total = null,
                                        $fitnesscategory = null,
                                        $userId = null
                                    ) 
        {
            $this->id  = $id;
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
            $this->fitness_category = $fitnesscategory;
            $this->user_id = $userId;
        }

        public function getId() {
            return $this->id;
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
            return $this->sdc;
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
            return $this->fitness_category;
        }
        public function getUserId() {
            return $this->user_id;
        }

        public function GenerateFitnessReport($db){
            $sql = "select u.id as UserId,
            MDL, pf.id, SPT, HRP ,SDC ,LTK, MR, total, first_name, last_name,rank, dob,date, spf.demand_category from soldier_physical_fitness pf
            JOIN user u
            ON pf.User_Id = u.id 
            Join soldier_physical_fitnesscategories spf 
            ON spf.category_id = pf.physical_fitness_categories_id 
            ";
            $pdostm = $db->prepare($sql);
            $pdostm->execute();
            $results = $pdostm->fetchAll(\PDO::FETCH_OBJ);
            return $results;
        }

        public static function getFitnessReportById($id, $db){
            $sql = "select u.id as UserId,
            MDL, pf.id, SPT, HRP ,SDC ,LTK, MR, total, first_name, last_name,rank, dob, spf.demand_category from soldier_physical_fitness pf
                JOIN user u
                ON pf.User_Id = u.id 
                Join soldier_physical_fitnesscategories spf 
                ON spf.category_id = pf.physical_fitness_categories_id  where pf.id = :personnel_id";//Possible error
            $pst = $db->prepare($sql);
            $pst->bindParam(':personnel_id', $id);
            $pst->execute();
            return $pst->fetch(\PDO::FETCH_OBJ);
        }

        public function addFitnessReport($db){


            $mdl = $this->getmdl();
            $spt = $this->getspt();
            $hrp = $this->getsdc();
            $sdc = $this->getltk();
            $ltk = $this->getltk();
            $mr  = $this->getmr();
            $total = $mdl + $spt + $hrp + $sdc + $ltk + $mr;
            $fitnessCategory = $this->getFitnessCategory();
            $userId = $this->getUserId();

            $sql = "INSERT INTO soldier_physical_fitness (`date`,MDL,SPT,HRP,SDC,LTK,MR,total,physical_fitness_categories_id,User_Id)
                    VALUES (NOW(), :mdl, :spt, :hrp, :sdc, :ltk, :mr, :total, :categoryId, :UserId)";

            $pst = $db->prepare($sql);

            $pst->bindParam(':mdl',$mdl);
            $pst->bindParam(':spt',$spt);
            $pst->bindParam(':hrp',$hrp);
            $pst->bindParam(':sdc',$sdc);
            $pst->bindParam(':ltk',$ltk);
            $pst->bindParam(':mr',$mr);
            $pst->bindParam(':total',$total);
            $pst->bindParam(':categoryId',$fitnessCategory);
            $pst->bindParam(':UserId',$userId);

            $count = $pst->execute();
            return $count;

        }

        public static function updateFitnessReport(FitnessReport $fitnessreport,$db) {

            $id              = $fitnessreport->getId();
            $mdl             = $fitnessreport->getmdl();
            $spt             = $fitnessreport->getspt();
            $hrp             = $fitnessreport->gethrp();
            $sdc             = $fitnessreport->getsdc();
            $ltk             = $fitnessreport->getltk();
            $mr              = $fitnessreport->getmr();
            $total           = $mdl + $spt + $hrp + $sdc + $ltk + $mr;

            $sql = "Update soldier_physical_fitness
                    set 
                        MDL = :mdl,
                        SPT = :spt,
                        HRP = :hrp,
                        SDC = :sdc,
                        LTK = :ltk,
                        MR =  :mr,
                        total = :total
                    WHERE id = :personnel_id";

            $pst =  $db->prepare($sql);

            $pst->bindParam(':mdl',$mdl);
            $pst->bindParam(':spt',$spt);
            $pst->bindParam(':hrp',$hrp);
            $pst->bindParam(':sdc',$sdc);
            $pst->bindParam(':ltk',$ltk);
            $pst->bindParam(':mr',$mr);
            $pst->bindParam(':total',$total);
            $pst->bindParam(':personnel_id',$id);

            $count = $pst->execute();
            return $count;
        }

        public function deleteFitnessReport($id, $db){
            $sql = "DELETE FROM soldier_physical_fitness WHERE id = :id";
            $pst = $db->prepare($sql);
            $pst->bindParam(':id', $id);
            $count = $pst->execute();
            return $count;
        }

    }



?>