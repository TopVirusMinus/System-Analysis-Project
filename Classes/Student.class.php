<?php
    require_once "Account.class.php";
    require_once "MainAttribs.class.php";

    class Student extends Account{
        private $grade = -1;
        private $cumulativeScore = -1;

        function __construct($id, $name, $email, $pass, $grade, $cumulativeScore){
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->grade = $grade;
            $this->CumulativeScore = $cumulativeScore;

        }

        public function setGrade($grade){
            $this->grade = $grade;
        }
        
        public function getGrade(){
            return $this->grade;
        }

        public function setCumulativeScore($cumulativeScore){
            $this->cumulativeScore = $cumulativeScore;
        }
        
        public function getCumulativeScore(){
            return $this->cumulativeScore;
        }

        public function renderPage(){

        }
    }
?>