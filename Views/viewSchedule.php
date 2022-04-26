<?php
    session_start();
    print_r($_SESSION);
    echo "<br>";
    $title = "Dashboard";
    require_once "header.php";

?>
<h1>Schedule</h1>
<table border=2px>
    <tr>
        <td>Course Name</td>
        <td>Course Room</td>
        <td>Time</td>
    </tr>
    <?php
        require_once "../Classes/Files.class.php";
        $student_course_file = new File("../Database/student-course.txt", "~");
        $course = new File("../Database/courses.txt", "~");
        $studentCourses = $student_course_file->getAllKeyword(0,$_SESSION["U-record"][0]);
        
        print_r($studentCourses);
        foreach($studentCourses as $s){
            $courseRecord = $course->getIdRow($s[1]);
            $courseName = $courseRecord[1];
            echo '<tr><td>'.$courseName.'</td></tr>';
        }
    ?>
</table>

<?php 
    echo '<br><a href="../Controllers/dashboard.control.php">Return to dashboard</a>';
    require_once "footer.php";
?>  