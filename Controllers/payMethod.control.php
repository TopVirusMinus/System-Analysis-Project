<?php
    echo '<a href="../Model/dologout.php">Log out</a>';
    session_start();

    $title = "Pay Method";

    require_once "../Views/header.php";
    require_once "../Model/Classes/Files.class.php";
    require_once "../Views/payMethodView.php";
    require_once "../Model/Classes/Getallrecord.class.php";
    require_once $_SESSION["classLocation"];


    $UserObj = new ($_SESSION["className"])($_SESSION["record"]);

    //print_r($UserObj);
    echo "<br>";
    echo "<br>";
    echo "<br>";


    $paymthds = new File("../Database/paymethod.txt");
    $paymthds->setIGetFromFile(new getAllRecords);
    $AllPayMethods2D = $paymthds->executeget();
    payMethodView($AllPayMethods2D);

?>