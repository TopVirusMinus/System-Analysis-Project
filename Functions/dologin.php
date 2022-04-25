<?php
    require_once "../Classes/Files.class.php";
    //header('Location: ../Controller/login.control.php');
    $userFile = new File("../Database/users.txt", "~");
    $record = $userFile->getRowKeyword($_POST["email"]);
    $recordArr = explode($userFile->getSeparator(), $record);
    
    $mailCheck = $recordArr[3];
    $passCheck = $recordArr[4];
    //print_r($recordArr);
    echo $passCheck."###".$_POST["Password"];
    $_POST["Password"] = md5($_POST["Password"]);
    
    if($mailCheck ==  $_POST["email"] && $passCheck == $_POST["Password"]){
        echo "Login Successful";
        session_start();
    
        //saves user record in the session
        $record = explode("~", $record);
        $_SESSION["U-record"] = $record;
        header("Location: ../Controllers/dashboard.control.php");
    }
    else{
        //header("Location: ../Controllers/login.control.php");
        echo "Login unuccessful";
    }
?>