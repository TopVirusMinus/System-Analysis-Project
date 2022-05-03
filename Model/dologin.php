<?php
    require_once "../Controllers/Files.class.php";
    //header('Location: ../View/login.View.php');
    $userFile = new File("../Database/users.txt", "~");
    $record = $userFile->getRowKeyword($_POST["email"]);
    $recordArr = explode($userFile->getSeparator(), $record);
    
    $mailCheck = $recordArr[3];
    $passCheck = $recordArr[4];
    print_r($recordArr);
    $_POST["Password"] = md5($_POST["Password"]);
    
    if($mailCheck ==  $_POST["email"] && trim($passCheck) == $_POST["Password"]){
        echo "Login Successful";
        session_start();
    
        //saves user record in the session
        $record = explode("~", $record);
        $_SESSION["U-record"] = $record;
        header("Location: ../Views/dashboard.view.php");
    }
    else{
        //header("Location: ../Views/login.view.php");
        echo "Login unuccessful";
    }
?>