<?php
    session_start();
    require_once "../Controllers/Files.class.php";
    print_r($_GET);
    
    //extract url queries to variables
    $teacherId = $_GET["teacherId"];
    $studentId = $_GET["studentId"];

    //open files
    $studentCourseFile = new File("../Database/student-course.txt", "~");
    $CourseFile = new File("../Database/courses.txt");

    //get course record from course name
    $courseRecord = $CourseFile->getRowKeyword(trim($_SESSION["U-record"][5]));
    echo $courseRecord;
    $courseRecord = explode($CourseFile->getSeparator(), $courseRecord);

    $courseId = $courseRecord[0];
    
    $student_course_record = $studentId."~".$courseId;
    $studentCourseFile->addRecord($student_course_record);

    header("location:../Views/manageStudents.php");
?>