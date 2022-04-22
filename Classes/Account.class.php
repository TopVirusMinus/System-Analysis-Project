<?php
    require_once "MainAttribs.class.php";

    abstract class Account extends MainAttribs{
        private $email = "";
        private $pass = "";

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

        
        abstract protected function renderPage();
    }

?>