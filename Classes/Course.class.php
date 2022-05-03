<?php
    require_once "Account.class.php";
    class Course extends Account{
        protected $year = -1;

        function __construct($id, $name, $year)
        {
            $this->id = $id;
            $this->name = $name;
            $this->year= $year;
        }
        
        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }
        
        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }
        
        public function setYear($year){
            $this->year = $year;
        }

        public function getYear(){
            return $this->year;
        }
        
    }
?>