<?php
    require_once "Account.class.php";
    require_once "MainAttribs.class.php";

    class Student extends Account{
        private $grade = -1;
        private $cumulativeScore = -1;
        public $record;

        function __construct($record){
            $this->id = $record[1];
            $this->name = $record[2];
            $this->email = $record[3];
            $this->pass = $record[4];
            $this->grade = $record[5];
        }

        public function setGrade($grade){
            $this->grade = $grade;
        }
        
        public function getGrade(){
            return $this->grade;
        }
        public function getId(){
            return $this->id;
        }
       
        public function getName(){
            return $this->name;
        }
       
        public function getEmail(){
            return $this->email;
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