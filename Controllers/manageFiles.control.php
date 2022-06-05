<?php
    session_start();

    if (empty($_SESSION)){
        echo "You need to login as admin to view this page! <br>";
        echo '<a href="login.control.php">Login</a>';
        exit;
    }
    
    if($_SESSION['record'][1] != 3){
        echo "You need to login as admin to view this dashboard! <br>";
        echo '<a href="../Model/dologout.php">Log out</a>';
        exit;
    }

    echo '<a href="../Model/dologout.php">Log out</a>';
    echo "<br>";
    echo "<br>";
    echo '<a href="../Controllers/dashboard.control.php">Return to dashboard</a><br>';
    require_once "../Model/getDirectory.php";
    require_once "../Views/drawTablesFromArray.php";
    $title = "Manage Files";
    require_once "../Views/header.php";

    $fileArr = getDirectoryArray("../Database/");
    drawTablesFromArray($fileArr);
?>