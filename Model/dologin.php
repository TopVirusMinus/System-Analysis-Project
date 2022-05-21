<?php
    require_once "../Model/Classes/Files.class.php";
    //header('Location: ../Controllers/login.control.php');
    $userFile = new File("../Database/users.txt", "~");
    $record = $userFile->getRowKeyword($_POST["email"]);
    
    $mailCheck = $record[3];
    $passCheck = $record[4];
    $_POST["Password"] = md5($_POST["Password"]);
    
    if($mailCheck ==  $_POST["email"] && trim($passCheck) == $_POST["Password"]){
        session_start();

        //get the user type and the class name of the user
        $userTypeFile = new File("../Database/user-type.txt");
        $userTypeRecord = $userTypeFile->getIdRow($record[1]);
        print_r($record);
        echo "<br>";
        echo "<br>";
        
        //add the object to the session
        require_once trim($userTypeRecord[2]);
        $userObj = new $userTypeRecord[1]($record);
        
        //convert object to encoded string using serialize to be later deserialized
        $_SESSION["userObject"] = serialize($userObj);
        echo "<br>";
        echo "<br>";
        print_r($_SESSION);
        
        $_SESSION["classLocation"] = trim($userTypeRecord[2]);
        header("Location: ../Controllers/dashboard.control.php");
    }
    else{
        //header("Location: ../Controllers/login.control.php");
        echo "Login unuccessful";
    }
?>