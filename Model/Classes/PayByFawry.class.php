<?php
require_once "IPayMethod.interface.php";
require_once $_SESSION["classLocation"];

global $userObj;
$userObj = unserialize($_SESSION["userObject"]);
$GLOBALS['obj'] = $userObj;

//print_r($userObj);

require_once "../Model/Classes/Files.class.php";
class PayByFawry implements IPayMethod{
    public function pay() {
        $userFile = new File("../Database/users.txt");
        echo $GLOBALS['obj']->getId();
        $userRecord = $userFile->getIdRow($GLOBALS['obj']->getId());
        print_r($userRecord);
        $userRecord[6] = 1;
        $userFile->deleteRecordbyId($userRecord[0]);
        $userRecord = implode("~",$userRecord);
        $userFile->addRecord($userRecord, 0);
    }
}