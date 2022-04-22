<?php
    require_once "MainAttribs.class.php";
    class Course extends MainAttribs{
        private $year = -1;

        function __construct($id, $name, $year)
        {
            $this->id = $id;
            $this->name = $name;
            $this->year= $year;
        }
        
        public function setYear($year){
            $this->year = $year;
        }

        public function getYear(){
            return $this->year;
        }
        
    }
?>