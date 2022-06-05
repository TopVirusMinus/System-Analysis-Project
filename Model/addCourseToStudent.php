<?php
    session_start();
    print_r($_SESSION);
    require_once "../Model/Classes/Files.class.php";
    require_once trim($_SESSION["classLocation"]);    
    $UserObj = new $_SESSION["className"]($_SESSION["record"]);

    //extract url queries to variables
    $teacherId = $_GET["teacherId"];
    $studentId = $_GET["studentId"];

    //open files
    $studentCourseFile = new File("../Database/student-course.txt", "~");
    //get course record from course name

    $courseId = $UserObj->getCourse()->getId();
    echo $courseId." ".$studentId;
    $student_course_record = $studentId."~".$courseId;
    $studentCourseFile->addRecord($student_course_record);
    
    // End my current session and save its id
    //$UserObj->fillStudents();

    header("location:../Controllers/manageStudents.control.php");
?>