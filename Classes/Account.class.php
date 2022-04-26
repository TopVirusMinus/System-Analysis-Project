<?php
    require_once "MainAttribs.class.php";
    class Account extends MainAttribs{
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