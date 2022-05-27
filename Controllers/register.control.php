<?php
    $title = "Register";
    require_once "../Views/header.php";
    require_once "../Views/showButtonsFromArray.php";
    require_once "../Model/Classes/Files.class.php";

    echo "<h1>Register As:</h1>";
    $uTypeFile = new File("../Database/user-type.txt","~");
    $uTypeFile->setIGetFromFile(new getAllRecords);
    $allRecords2D = $uTypeFile->executeget();
    
    echo '<form action="GetRegisterInfo.control.php" method="post">';
    showButtonsFromArray($allRecords2D);
    echo '</form>';