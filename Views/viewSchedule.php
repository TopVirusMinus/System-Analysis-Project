<?php
    session_start();
    echo '<a href="../Model/dologout.php">Log out</a>';
    echo "<br>";
    $title = "Dashboard";
    require_once "header.php";
?>  

<h1>Schedule</h1>

<?php
    require_once $_SESSION["classLocation"];
    require_once "../Model/Classes/Files.class.php";
    $UserObj = new $_SESSION["className"]($_SESSION["record"]);

    $UserObj->showTable();
?>
</table>

<?php 
    echo '<br><a href="../Controllers/dashboard.control.php">Return to dashboard</a>';
    require_once "footer.php";
?>  