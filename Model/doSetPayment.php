<?php
session_start();
require_once $_SESSION["classLocation"];
require_once "../Model/Classes/PayByFawry.class.php";

$UserObj = new ($_SESSION["className"])($_SESSION["record"]);
//print_r($UserObj);
echo "<br>";
echo "<br>";
echo "<br>";

//print_r($_GET);

require_once $_GET["location"];
$UserObj->setPayMethod(new $_GET["class"]);
//print_r($UserObj->getPayMethod());
$UserObj->getPayMethod()->pay();
header("location:../Controllers/payMethod.control.php");