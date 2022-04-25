<?php 
    $title = "Add Students";
    require_once "../Views/header.php";
?>

<?php
    session_start();
?>
<h1>
    List All Students
</h1>
<table border=2 px>
    <tr>
        <td>Student name</td>
        <td>Student email</td>
        <td>Student Grade</td>
    </tr>
    <?php
        require_once "../Classes/Files.class.php";
        require_once "../Classes/Student.class.php";
        $studentFile = new File("../Database/users.txt", "~");
        $teacherFile = new File("../Database/users.txt", "~");
        $courseFile = new File("../Database/courses.txt", "~");

        //get course from curr teacher's database
        $teacherRecord = $teacherFile->getIdRow($_SESSION["id"]);
        $course = $teacherRecord[5];

        //get course record from course database
        $courseRecord = $courseFile->getRowKeyword(trim($course));

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
<<<<<<< HEAD
            echo '<tr><td>'.$studentsObjArray[$i]->getName().'</td><td>'.$studentsObjArray[$i]->getEmail().'</td><td>'.$studentsObjArray[$i]->getGrade().'</td><td><a href="addCourseToStudent.php?studentId='.$studentsObjArray[$i]->getId().'&teacherId='.$teacherRecord[0].'">Add</a></td></tr>';
        }
        ?>
=======
            echo "<tr><td>".$studentsObjArray[$i]->getName()."</td><td>".$studentsObjArray[$i]->getEmail()."</td><td>".$studentsObjArray[$i]->getGrade()."</td><td><a href=del.php?id=".$studentsObjArray[$i]->id.">Add</a></td></tr>";
        }
        ?>
    <!-- ? dh 3l4an el get -->
>>>>>>> 4f31476f73973a39791dd1ad6dc0d03bd3908b71
</table>

<?php 
    require_once "../Views/footer.php";
    echo '<br><a href="../Controllers/dashboard.control.php">Return to dashboard</a>';
?>