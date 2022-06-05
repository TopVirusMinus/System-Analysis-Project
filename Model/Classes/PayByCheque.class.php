<?php
require_once "IPayMethod.interface.php";
require_once "GetidRow.class.php";
require_once "PayTuition.abstractclass.php";
require_once $_SESSION["classLocation"];
require_once "../Model/Classes/Files.class.php";


global $UserObj;
$UserObj = new $_SESSION["className"]($_SESSION["record"]);
$GLOBALS['obj'] = $UserObj;

//print_r($UserObj);

class PayByCheque extends PayTuition implements IPayMethod{
    public $payTuitionRef;

    function __construct($ref)
    {
        $this->payTuitionRef = $ref;
    }

    public function getCost(){
        return 100 + $this->payTuitionRef->getCost();
    }

    public function pay() {
        $userFile = new File("../Database/users.txt");
        $userFile->setIGetFromFile(new getIdRow);
        echo $GLOBALS['obj']->getId();
        $userRecord = $userFile->executeget($GLOBALS['obj']->getId());
        print_r($userRecord);
        $userRecord[6] = 3;
        $userFile->deleteRecordbyId($userRecord[0]);
        $userRecord = implode("~",$userRecord);
        $userFile->addRecord($userRecord, 0);
    }
}   