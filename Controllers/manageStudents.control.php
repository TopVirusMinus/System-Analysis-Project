<?php 
    session_start();
    //print_r($_SESSION);
    $title = "Add Students";
    require_once "../Views/header.php";
?>

<?php
    require_once $_SESSION["classLocation"];
    require_once "../Views/showStudents.php";

    $userObj = unserialize($_SESSION["userObject"]);
    print_r($userObj);
    

    //Encapsulate it to a model function
    echo '<h1>List All Students In Grade '.$userObj->getCourse()->getYear().'</h1>';
    $students = new File("../Database/users.txt");
    $showMe = $students->getAllKeyword(5, $userObj->getCourse()->getYear());

    showAllStudentsTable($showMe, $userObj->getId());

    //$students 
    //$students = new File("../Database/users.txt");
    //$i = 5;
    //$students->drawtablefromfile("../Controllers/manageStudents.control.php", array(1,4,6), 5,$userObj->getCourse()->getYear());

    $userObj->showTable(0, 1);
?>
</table>

<?php 
    echo '<br><a href="../Controllers/dashboard.control.php">Return to dashboard</a>';
    require_once "../Views/footer.php";
?>  