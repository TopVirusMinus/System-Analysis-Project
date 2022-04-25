<?php
    require_once "Account.class.php";
    require_once "MainAttribs.class.php";

    class Student extends Account{
        private $grade = -1;
        private $cumulativeScore = -1;
<<<<<<< HEAD
        private $Teachers=array();
        private $Courses=array();

        function __construct($record){
            $this->id = $record[0];
=======
        public $record;

        function __construct($record){
            $this->id = $record[1];
>>>>>>> 4f31476f73973a39791dd1ad6dc0d03bd3908b71
            $this->name = $record[2];
            $this->email = $record[3];
            $this->pass = $record[4];
            $this->grade = $record[5];
        }

        public function setGrade($grade){
            $this->grade = $grade;
        }

        public function setSingleTeacher($Teacher){
            array_push($this->Teachers, $Teacher);
        }
        public function setSingleCourse($Courses){
            array_push($this->Courses, $Courses);
        }

        public function getSingleTeacher($index){
            if($index < count($this->Teachers)){
                return $this->Teachers[$index];
            }
            else{
                echo "Teacher index out of range";
            }
        }
        public function getSingleCourse($index){
            if($index < count($this->Courses)){
                return $this->Courses[$index];
            }
            else{
                echo "Course index out of range";
            }
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