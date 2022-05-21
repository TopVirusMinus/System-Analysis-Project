<?php
    session_start();
    echo "<br>";
    $title = "Dashboard";
    require_once "header.php";
?>  

<h1>Schedule</h1>

<?php
    require_once $_SESSION["classLocation"];
    require_once "../Model/Classes/Files.class.php";
    $userObj = unserialize($_SESSION["userObject"]);
    print_r($userObj);

    $userObj->showTable();
?>
</table>

<?php 
    echo '<br><a href="../Controllers/dashboard.control.php">Return to dashboard</a>';
    require_once "footer.php";
?>  