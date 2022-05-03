<?php
    require_once "Account.class.php";
    require_once "IShowTable.interface.php";
    require_once "Files.class.php";
    class Teacher extends Account implements IShowTable{
        protected $subject_name = "";
        protected $studentsFile = NULL;
        protected $studentObjArr = [];
        
        function __construct($id, $name, $email, $pass, $subject_name){
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->subject_name = $subject_name;
            $studentsFile = new File("../Database/users.txt");
        }
        
        public function setGrade($subject_name){
            $this->subject_name = $subject_name;
        }
        
        public function getGrade(){
            return $this->subject_name;
        }

        public function setsubject($subject)
        {
            $this->subject_name = $subject;
        }

        public function getsubject()
        {
            return $this->subject_name;
        }            

        public function showTable(){
            echo"<table border=2 px>";
            echo "<tr>";
            //$key contains an attribute each loop
            foreach($this as $key => $value){
                echo '<td>Teacher '.$key.'</td>';
            }
            echo "</tr>";
        }
    }
?>