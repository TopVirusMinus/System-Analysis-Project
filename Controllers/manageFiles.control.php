<?php
    echo '<a href="../Controllers/dashboard.control.php">Return to dashboard</a><br>';
    require_once "../Model/getDirectory.php";
    require_once "../Views/drawTablesFromArray.php";
    
    $fileArr = getDirectoryArray("../Database/");
    drawTablesFromArray($fileArr);
?>