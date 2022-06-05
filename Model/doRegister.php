<?php
    require_once "../Model/Classes/Files.class.php";                                            
    require_once "../Model/Classes/Getlastid.class.php";
    
    $userFile = new File("../Database/users.txt");
    $userRecord = $userFile->setIGetFromFile(new getLastId);
    echo $userFile->setIGetFromFile(new getLastId);
    echo $userFile->executeget();
    echo '<br><br>';
    unset($_POST["CPassword"]);
    print_r($_POST);                                            
    $_POST["Password"] = md5($_POST["Password"]);
    foreach($_POST as $p){
        $userRecord .= $p.$userFile->getSeparator();
    }

    $userRecord = substr($userRecord, 0, -1);

    print_r($userRecord);
    

    
    $userFile->addRecord($userRecord);
    header("location:../Controllers/login.control.php");                                          
?>                                          