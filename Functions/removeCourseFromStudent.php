<?php
    require_once "../Classes/Files.class.php";
    print_r($_GET);
   echo  "<br>";
    //get student id from url
    $studentId = $_GET["studentId"];

    //open student-course.txt
    $studentCourseFile = new File("../Database/student-course.txt", "~"); 
    echo $studentCourseFile->getDestination();
    //get course record from course name
    $studentCourseFile->deleteRecordbyId($studentId);

    header("location:../Views/manageStudents.php");
?>