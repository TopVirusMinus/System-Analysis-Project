<?php
require_once "IPayMethod.interface.php";
require_once "GetidRow.class.php";
require_once $_SESSION["classLocation"];

global $UserObj;
$UserObj = new ($_SESSION["className"])($_SESSION["record"]);
$GLOBALS['obj'] = $UserObj;

//print_r($UserObj);

require_once "../Model/Classes/Files.class.php";
class PayByFawry implements IPayMethod{
    public function pay() {
        $userFile = new File("../Database/users.txt");
        $userFile->setIGetFromFile(new getIdRow);
        echo $GLOBALS['obj']->getId();
        $userRecord = $userFile->executeget($GLOBALS['obj']->getId());
        print_r($userRecord);
        $userRecord[6] = 1;
        $userFile->deleteRecordbyId($userRecord[0]);
        $userRecord = implode("~",$userRecord);
        $userFile->addRecord($userRecord, 0);
    }
}