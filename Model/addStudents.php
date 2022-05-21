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
        require_once "../Model/Classes/Files.class.php";
        require_once "../Model/Classes/Student.class.php";
        require_once "../Model/Classes/GetFile.class.php";
        require_once "../Model/Classes/GetAllKeyword.php";
        require_once "../Model/Classes/GetidRow.class.php";
        require_once "../Model/Classes/GetRowKeyword.class.php";
        $studentFile = new File("../Database/users.txt", "~");
        $studentFile->setGetFromFile(new GetAllKeyword());
        $teacherFile = new File("../Database/users.txt", "~");
        $teacherFile->setGetFromFile(new GetidRow());
        $courseFile = new File("../Database/courses.txt", "~");
        $courseFile->setGetFromFile(new GetRowKeyword());
        
        //get course from curr teacher's database
        $teacherRecord = $teacherFile->executeget($_SESSION["id"]);
        print_r($teacherRecord);
        echo "mm".$_SESSION["id"];
        //get course record from course database
        $course = $teacherRecord[5];
        $courseRecord = $courseFile->executeget($course);
        
        //get course year from course database
        
        //get all students with course year = student year
        $index = "5";
        $array  = array_map('intval', str_split($index));
        $courseYear = $courseRecord[2];
        $filteredstudents = $studentFile->executeget($array[0],$courseYear);
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
            echo '<tr><td>'.$studentsObjArray[$i]->getName().'</td><td>'.$studentsObjArray[$i]->getEmail().'</td><td>'.$studentsObjArray[$i]->getGrade().'</td><td><a href="addCourseToStudent.php?studentId='.$studentsObjArray[$i]->getId().'&teacherId='.$teacherRecord[0].'">Add</a></td></tr>';
        }
        ?>
</table>

<?php 
    require_once "../Views/footer.php";
    echo '<br><a href="../Controllers/dashboard.control.php">Return to dashboard</a>';
?>