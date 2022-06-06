<?php
    require_once "../Model/Classes/Files.class.php";                                            
    require_once "../Model/Classes/Getlastid.class.php";
    require_once "../Model/Classes/GetRowKeyword.class.php";

    $userFile = new File("../Database/users.txt");
    $userRecord = $userFile->setIGetFromFile(new getLastId);
    //echo $userFile->setIGetFromFile(new getLastId);
    //echo $userFile->executeget();
    //echo '<br><br>';
    unset($_POST["CPassword"]);
    //print_r($_POST);                     
    
    $userFile->setIGetFromFile(new getRowKeyword);
    $emailExists = $userFile->executeget(trim($_POST["email"]),3);

    if($emailExists != False){
        echo "Email Already Exists <br>";
        echo '<a href="../Controllers/login.control.php">Login</a><br>';
        echo '<a href="../Controllers/register.control.php">Re-register</a>';
        exit;
    }


    $_POST["Password"] = md5($_POST["Password"]);
    foreach($_POST as $p){
        $userRecord .= $p.$userFile->getSeparator();
    }

    $userRecord = substr($userRecord, 0, -1);

    print_r($userRecord);
    

    
    $userFile->addRecord($userRecord);
    header("location:../Controllers/login.control.php");                                          
?>                                          