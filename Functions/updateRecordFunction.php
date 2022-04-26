<?php
    require_once "../Classes/Files.class.php";
    $userFile = new File("../Database/users.txt", "~");

    print_r($_POST);

    //convert record string to array
    $recordArr = explode("~", $_POST["record"]);

    //delete the record
    $userFile->deleteRecordbyId($recordArr[0]);

    //add the new record without adding new id
    $userFile->addRecord($_POST["record"], 0);

    header("location:../Views/manageUsers.php");

?>