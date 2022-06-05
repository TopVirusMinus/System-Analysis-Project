<?php 
    session_start();

    if (empty($_SESSION)){
        echo "You need to login as teacher to view this page! <br>";
        echo '<a href="login.control.php">Login</a>';
        exit;
    }
    
    if($_SESSION['record'][1] != 2){
        echo "You need to login as teacher to view this dashboard! <br>";
        echo '<a href="../Model/dologout.php">Log out</a>';
        exit;
    }

    //print_r($_SESSION);
    $title = "Add Students";
    require_once "../Views/header.php";
?>

<?php
    require_once $_SESSION["classLocation"];
    require_once "../Views/showStudents.php";
    require_once ("../Model/Classes/GetAllKeyword.php");
    require_once "../Views/showPaidStudents.php";
    echo '<a href="../Model/dologout.php">Log out</a>';

    $UserObj = new $_SESSION["className"]($_SESSION["record"]);

    print_r($UserObj);    

    //Encapsulate it to a model function
    echo '<h1>All Paid Students In Grade '.$UserObj->getCourse()->getYear().'</h1>';
    $students = new File("../Database/users.txt");
    $students->setIGetFromFile(new GetAllKeyword());
    $showMe = $students->executeget(5, $UserObj->getCourse()->getYear());
    //print_r($students);
    $sameGradeStudents = $students->executeget(5, $UserObj->getCourse()->getYear());
    
    $paidStudents = array();
    foreach($sameGradeStudents as $s){
        if($s[6] != -1){
            array_push($paidStudents,$s);
        }
    }

    

    showAllPaidStudentsTable($paidStudents, $UserObj->getId());

    //$students 
    //$students = new File("../Database/users.txt");
    //$i = 5;
    //$students->drawtablefromfile("../Controllers/manageStudents.control.php", array(1,4,6), 5,$UserObj->getCourse()->getYear());

    $UserObj->showTable(0, 1);
?>
</table>

<?php 
    echo '<br><a href="../Controllers/dashboard.control.php">Return to dashboard</a>';
    require_once "../Views/footer.php";
?>  