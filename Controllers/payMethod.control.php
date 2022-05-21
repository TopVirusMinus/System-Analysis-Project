<?php
    session_start();

    $title = "Pay Method";
    require_once "../Views/header.php";

    require_once $_SESSION["classLocation"];
    $userObj = unserialize($_SESSION["userObject"]);
    print_r($userObj);
    echo "<br>";
    echo "<br>";
    echo "<br>";



    require_once "../Model/Classes/Files.class.php";
    require_once "../Views/payMethodView.php";

    $paymthds = new File("../Database/paymethod.txt");
    $AllPayMethods2D = $paymthds->getAllRecords();
    
    payMethodView($AllPayMethods2D);

?>