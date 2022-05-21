<?php
session_start();
require_once $_SESSION["classLocation"];
require_once "../Model/Classes/PayByFawry.class.php";

$userObj = unserialize($_SESSION["userObject"]);
//print_r($userObj);
echo "<br>";
echo "<br>";
echo "<br>";

//print_r($_GET);

require_once $_GET["location"];
$userObj->setPayMethod(new $_GET["class"]);
//print_r($userObj->getPayMethod());
$userObj->getPayMethod()->pay();
header("location:../Controllers/payMethod.control.php");