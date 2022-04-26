<?php
abstract class MainAttribs{
    protected  $id = -1;
    protected  $name = "";
    protected  $userType = "";

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
}
?>