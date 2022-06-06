<?php
require_once "../Model/Classes/Files.class.php";
require_once "../Model/Classes/GetidRow.class.php";
require_once "../Views/signup-main.php";

//print_r($_POST);
$registerAttribFile = new File("../Database/userTypeAttribs.txt");
$registerAttribFile->setIGetFromFile(new getIdRow());
$registerAttribArray = $registerAttribFile->executeget($_POST["user-type"]);

registerFields($registerAttribArray, $_POST["user-type"]);
