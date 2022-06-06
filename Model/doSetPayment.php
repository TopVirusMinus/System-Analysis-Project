<?php
session_start();

if (empty($_SESSION)){
    echo "You need to login to view the dashboard! <br>";
    echo '<a href="login.control.php">Login</a>';
    exit;
}
if($_SESSION['record'][1] != 1){
    echo "You need to login as student to use this function! <br>";
    echo '<a href="../Model/dologout.php">Log out</a>';
    exit;
}

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