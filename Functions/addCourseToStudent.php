<?php
    require_once "../Classes/Files.class.php";
    print_r($_GET);
    
    //extract url queries to variables
    $teacherId = $_GET["teacherId"];
    $studentId = $_GET["studentId"];

    //open files
    $studentCourseFile = new File("../Database/student-course.txt", "~");
    $TeacherCourseFile = new File("../Database/teacher-course.txt", "~");
    $CourseFile = new File("../Database/courses.txt", "~");

    //extract courseId from courseName
    $tr = $TeacherCourseFile->getIdRow($teacherId);
    //$tr = explode($TeacherCourseFile->getSeparator(), $tr);
    echo "<br>";
    print_r($tr);
    echo "<br>";

    //get course record from course name
    $courseRecord = $CourseFile->getRowKeyword(trim($tr[1]));
    echo $courseRecord;
    $courseRecord = explode($CourseFile->getSeparator(), $courseRecord);

    $courseId = $courseRecord[0];
    
    $student_course_record = $studentId."~".$courseId;
    $studentCourseFile->addRecord($student_course_record, 0);

    header("location:../Functions/addStudents.php");
?>