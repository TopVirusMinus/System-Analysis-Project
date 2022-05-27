<?php
    require_once "../Model/Classes/Files.class.php";
    require_once "../Model/Classes/GetRowKeyword.class.php";
    require_once "../Model/Classes/GetidRow.class.php";
    //header('Location: ../Controllers/login.control.php');
    $userFile = new File("../Database/users.txt", "~");
    $userFile->setIGetFromFile(new GetRowKeyword());
    $record = $userFile->executeget($_POST["email"]);
    
    $mailCheck = $record[3];
    $passCheck = $record[4];
    $_POST["Password"] = md5($_POST["Password"]);
    
    if($mailCheck ==  $_POST["email"] && trim($passCheck) == $_POST["Password"]){
        session_start();
        //get the user type and the class name of the user
        $userTypeFile = new File("../Database/user-type.txt");
        $userTypeFile->setIGetFromFile(new GetidRow()); 
        $userTypeRecord = $userTypeFile->executeget($record[1]);
        
        
        $_SESSION["record"] = $record;
        $_SESSION["classLocation"] = trim($userTypeRecord[2]);
        $_SESSION["className"] = trim($userTypeRecord[1]);
        
        print_r($_SESSION);
        header("Location: ../Controllers/dashboard.control.php");
    }
    else{
        //header("Location: ../Controllers/login.control.php");
        echo "Login unuccessful";
    }
?>