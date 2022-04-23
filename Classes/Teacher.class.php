<?php
    require_once "Person.interface.php";
    class Teacher extends Account{
        private $subject_name = "";

        function __construct($id, $name, $email, $pass, $subject_name){
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->subject_name = $subject_name;
        }
        
        public function setGrade($subject_name){
            $this->subject_name = $subject_name;
        }
        
        public function getGrade(){
            return $this->subject_name;
        }

        public function renderPage(){

        }
        
    }
?>