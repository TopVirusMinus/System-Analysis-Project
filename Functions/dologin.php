<?php
    require_once "../Classes/Files.class.php";
    //header('Location: ../Controller/login.control.php');
    $userFile = new File("../Database/users.txt", "~");
    $record = $userFile->getRowKeyword($_POST["email"]);
    $recordArr = explode($userFile->getSeparator(), $record);
    
    $mailCheck = $recordArr[3];
    $passCheck = $recordArr[4];
    //print_r($recordArr);

    if($mailCheck ==  $_POST["email"] && $passCheck == $_POST["Password"]){
        echo "Login Successful";
        session_start();
        
        //saves userId and type in a session
        $_SESSION["id"] = $recordArr[0];
        $_SESSION["user-type"] = $recordArr[1];
        header("Location: ../Controllers/dashboard.control.php");
    }
    else{
        header("Location: ../Controllers/login.control.php");
    }
?>