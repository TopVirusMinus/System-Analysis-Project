<?php
    require_once "Account.class.php";
    require_once "MainAttribs.class.php";

    class Student extends Account{
        protected  $grade = -1;
        protected  $cumulativeScore = -1;
        protected  $Teachers=array();
        protected  $Courses=array();

        function __construct($record){
            if($record){
                $this->id = $record[0];
                $this->userType = $record[1];
                $this->name = $record[2];
                $this->email = $record[3];
                $this->pass = $record[4];
                $this->grade = $record[5];
            }
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

        public function setCumulativeScore($cumulativeScore){
            $this->cumulativeScore = $cumulativeScore;
        }
        
        public function getCumulativeScore(){
            return $this->cumulativeScore;
        }
    }
?>