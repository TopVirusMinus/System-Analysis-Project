<?php
    require_once "IShowTable.interface.php";
    class Account{
        protected  $id = -1;
        protected  $name = "";
        protected  $userType = "";
        protected  $email = "";
        protected  $pass = "";

        function __construct($record){
            if($record){
                $this->id = $record[0];
                $this->userType = $record[1];
                $this->name = $record[2];
                $this->email = $record[3];
                $this->pass = $record[4];
            }
        }
        public function setId($id){
            $this->id = $id;
        }
    
        public function setName($name){
            $this->name = $name;
        }
    
        public function getId(){
            return $this->id;
        }
    
        public function setUserType($userType){
            $this->userType= $userType;
        }
    
        public function getUserType(){
            return $this->userType;
        }
    
        public function getName(){
            return $this->name;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setPass($pass){
            $this->pass = $pass;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPass(){
            return $this->pass;
        } 
    }

?>