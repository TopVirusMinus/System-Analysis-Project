<?php
    require_once "../Model/Classes/Files.class.php";
    $userFile = new File($_GET["destination"]);

    print_r($_GET);
    echo "<br>";
    echo "<br>";
    print_r($_POST);

    //convert record string to array
    $recordArr = explode("~", $_POST["newRecord"]);

    //delete the record
    $userFile->deleteRecordbyId($recordArr[0]);

    //add the new record without adding new id
    $userFile->addRecord($_POST["newRecord"], 0);

    header("location:".$_GET["source"]);

?>