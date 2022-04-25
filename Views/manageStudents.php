<?php 
    $title = "Add Students";
    require_once "../Views/header.php";
?>

<?php
    session_start();
    print_r($_SESSION);
?>

<h1>List All Students</h1>
<table border=2px>
    <tr>
        <td>Student name</td>
        <td>Student email</td>
        <td>Student Grade</td>
        <td>Add to course</td>
    </tr>
    <?php
        require_once "../Classes/Files.class.php";
        require_once "../Classes/Student.class.php";
        $studentFile = new File("../Database/users.txt", "~");
        $courseFile = new File("../Database/courses.txt", "~");

        
        //get course record from course database
        $courseRecord = $courseFile->getRowKeyword(trim($_SESSION["U-record"][5]));

        //get course year from course database
        $courseRecord = explode("~",$courseRecord);
        $courseYear = $courseRecord[2];
        
        //get all students with course year = student year
        $filteredstudents = $studentFile->getAllKeyword(5,trim($courseYear));
        //print_r($filteredstudents);
        
        
        //convert record to student object and fill it in array $studentsObjArray
        $studentsObjArray = array();
        foreach($filteredstudents as $a){
            $student = new Student($a);
            array_push($studentsObjArray, $student);
        }
        
        //display the content in table
        for($i=0;$i<count($studentsObjArray);$i++)
        {
            echo '<tr><td>'.$studentsObjArray[$i]->getName().'</td><td>'.$studentsObjArray[$i]->getEmail().'</td><td>'.$studentsObjArray[$i]->getGrade().'</td><td><a href="../Functions/addCourseToStudent.php?studentId='.$studentsObjArray[$i]->getId().'&teacherId='.$_SESSION["U-record"][0].'">Add</a></td></td></tr>';
        }
        ?>
</table>

<h1>My Students</h1>
<table border=2 px>
    <tr>
        <td>Student name</td>
        <td>Student email</td>
        <td>Student Grade</td>
        <td>Remove from Course</td>
    </tr>
    <?php
        require_once "../Classes/Files.class.php";
        require_once "../Classes/Student.class.php";
        $student_course_File = new File("../Database/student-course.txt", "~");
        $studentFile = new File("../Database/users.txt", "~");
        $courseFile = new File("../Database/courses.txt", "~");
        
        //get course from curr teacher's database
        $course = $_SESSION["U-record"][5];
        
        //get course record from course database
        $courseRecord = $courseFile->getRowKeyword(trim($course));
        $teacherCourseId = explode($courseFile->getSeparator(), $courseRecord)[0];
        //get all students that have the same id as the teacher's from student-course.txt
        $filteredstudents = $student_course_File->getAllKeyword(1,$teacherCourseId); 

        print_r($filteredstudents);
        
        //convert record to student object and fill it in array $studentsObjArray
        $studentsObjArray = array();
        foreach($filteredstudents as $a){
            $studentRecord = $studentFile->getIdRow($a[0]);
            $student = new Student($studentRecord);
            array_push($studentsObjArray, $student);
        }

        //display the content in table
        for($i=0;$i<count($studentsObjArray);$i++)
        {
            echo '<tr><td>'.$studentsObjArray[$i]->getName().'</td><td>'.$studentsObjArray[$i]->getEmail().'</td><td>'.$studentsObjArray[$i]->getGrade().'</td><td><a href="../Functions/removeCourseFromStudent.php?studentId='.$studentsObjArray[$i]->getId().'">Remove</a></td></tr>';
        }
        ?>
</table>

<?php 
    require_once "../Views/footer.php";
    echo '<br><a href="../Controllers/dashboard.control.php">Return to dashboard</a>';
?>  