<?php
    require_once "../Model/Classes/Files.class.php";
    $userFile = new File($_GET["destination"], "~");

    print_r($_GET);

    //add the new record without adding new id
    $userFile->addRecord($_POST["newRecord"], 0);

    header("location:".$_GET["source"]);
?>