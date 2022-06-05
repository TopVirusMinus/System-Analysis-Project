<?php
session_start();
require_once $_SESSION["classLocation"];
require_once "../Model/Classes/PayByFawry.class.php";
require_once $_GET["location"];
require_once "../Model/Classes/OriginalCost.class.php";

$UserObj = new $_SESSION["className"]($_SESSION["record"]);
//print_r($UserObj);
echo "<br>";
echo "<br>";
echo "<br>";

//print_r($_GET);

$UserObj->setPayMethod(new $_GET["class"](new OriginalCost));
//print_r($UserObj->getPayMethod());
echo "<br>";
$UserObj->getPayMethod()->pay();
header("location:../Controllers/payMethod.control.php");