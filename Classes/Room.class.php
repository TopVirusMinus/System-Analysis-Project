<?php
    require_once "Account.class.php";

    class Room extends Account{
        protected $isLab = false;
        function __construct($id, $name, $isLab)
        {
            $this->id = $id;
            $this->name = $name;
            $this->isLab= $isLab;
        }

        public function setLab($isLab){
            $this->isLab= $isLab;
        }
        
        public function getGrade(){
            return  $this->isLab;

        }

    }
?>