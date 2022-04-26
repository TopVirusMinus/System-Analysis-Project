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
    </tr>
    <?php
        require_once "../Classes/Files.class.php";
        $student_course_file = new File("../Database/student-course.txt", "~");
        $student_course_details_file =  new File("../Database/student-course-details.txt", "~");
        $course = new File("../Database/courses.txt", "~");
        $course_room =  new File("../Database/course-room.txt", "~");
        $room = new File("../Database/rooms.txt","~");
        
        $studentCourses = $student_course_file->getAllKeyword(1,$_SESSION["U-record"][0]);
        //print_r($studentCourses);
        echo "<br>";
        $ct = 0;
        foreach($studentCourses as $s){
            $courseRecord = $course->getIdRow($s[1]);
            $rooms = $course_room->getAllKeyword(1,$s[1]);
            echo "<br>";
            //print_r($roomId);
            //print_r($rooms);
            $courseName = $courseRecord[1];
            //cho $rooms[$ct][2];
            $roomName = $room->getIdRow(trim($rooms[$ct][2]))[1]; 
            echo '<tr><td>'.$courseName.'</td><td>'.$roomName.'</td></tr>';
            $ct += 1;
        }
    ?>
</table>

<?php 
    echo '<br><a href="../Controllers/dashboard.control.php">Return to dashboard</a>';
    require_once "footer.php";
?>  