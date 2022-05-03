<?php
require_once "../Classes/Files.class.php";
    $userFile = new File($_GET["destination"], "~");

    print_r($_GET);

    //add the new record without adding new id
    $userFile->addRecord($_POST["newRecord"]);

    header("location:".$_GET["source"]);
?>