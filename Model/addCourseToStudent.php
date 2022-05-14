<?php
    session_start();
    print_r($_SESSION);
    require_once "../Model/Classes/Files.class.php";
    require_once trim($_SESSION["classLocation"]);    
    $userObj = unserialize($_SESSION["userObject"]);

    //extract url queries to variables
    $teacherId = $_GET["teacherId"];
    $studentId = $_GET["studentId"];

    //open files
    $studentCourseFile = new File("../Database/student-course.txt", "~");
    $userObj = unserialize($_SESSION["userObject"]);

    //get course record from course name

    $courseId = $userObj->getCourse()->getId();
    echo $courseId." ".$studentId;
    $student_course_record = $studentId."~".$courseId;
    $studentCourseFile->addRecord($student_course_record);
    
    // End my current session and save its id
    //$userObj->fillStudents();

    header("location:../Controllers/manageStudents.control.php");
?>