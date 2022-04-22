<?php
    require_once "../Classes/Files.class.php";
    //header('Location: ../Controller/login.control.php');
    $userFile = new File("../Database/users.txt", "~");
    $mailCheck = $userFile->getRowKeyword($_POST["email"]);
    $passCheck = $userFile->getRowKeyword(md5($_POST["Password"]));
    $recordArr = explode($userFile->getSeparator(), $passCheck);
    print_r($recordArr);
    if($mailCheck != FALSE && $passCheck != FALSE){
        echo "Login Successful";
        session_start();
        
        //saves userId and type in a session
        $_SESSION["id"] = $recordArr[0];
        $_SESSION["user-type"] = $recordArr[1];
        header("Location: ../Controllers/dashboard.control.php");
    }
?>