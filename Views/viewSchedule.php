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
        require_once "../Controllers/Files.class.php";
        $student_course_file = new File("../Database/student-course.txt");
        $student_course_details_file =  new File("../Database/student-course-details.txt");
        $course = new File("../Database/courses.txt");
        $course_room =  new File("../Database/course-room.txt");
        $room = new File("../Database/rooms.txt");
        
        $studentCourses = $student_course_file->getAllKeyword(1,$_SESSION["U-record"][0]);
        print_r($studentCourses);
        echo "<br>";
        
        foreach($studentCourses as $s){
            $courseRecord = $course->getIdRow($s[2]);
            $rooms = $course_room->getAllKeyword(1,$s[2]);
            echo "<br>";
            //print_r($courseRecord);
            //print_r($roomId);
            //print_r($rooms);
            $courseName = $courseRecord[1];
            $roomRecord = $room->getIdRow(trim($rooms[0][2]));
            //print_r($roomRecord);
            $roomName = $roomRecord[1];
            echo '<tr><td>'.$courseName.'</td><td>'.$roomName.'</td></tr>';
        }
    ?>
</table>

<?php 
    echo '<br><a href="../Views/dashboard.view.php">Return to dashboard</a>';
    require_once "footer.php";
?>  