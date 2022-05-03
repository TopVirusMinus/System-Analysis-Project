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
        <td>Student id</td>
        <td>Student name</td>
        <td>Student email</td>
        <td>Student Grade</td>
        <td>Add to course</td>
    </tr>
    <?php
        require_once "../Controllers/Files.class.php";
        require_once "../Controllers/Student.class.php";
        $studentFile = new File("../Database/users.txt");
        $courseFile = new File("../Database/courses.txt");

        
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
            echo '<tr><td>'.$studentsObjArray[$i]->getId().'</td>.<td>'.$studentsObjArray[$i]->getName().'</td><td>'.$studentsObjArray[$i]->getEmail().'</td><td>'.$studentsObjArray[$i]->getGrade().'</td><td><a href="../Model/addCourseToStudent.php?studentId='.$studentsObjArray[$i]->getId().'&teacherId='.$_SESSION["U-record"][0].'">Add</a></td></td></tr>';
        }
        ?>
</table>

<h1>My Students</h1>
<table border=2px>
    <tr>
        <td>Student id</td>
        <td>Student name</td>
        <td>Student email</td>
        <td>Student Grade</td>
        <td>Remove from Course</td>
    </tr>
    <?php
        require_once "../Controllers/Files.class.php";
        require_once "../Controllers/Student.class.php";
        $student_course_File = new File("../Database/student-course.txt");
        $studentFile = new File("../Database/users.txt");
        $courseFile = new File("../Database/courses.txt");
        
        //get course from curr teacher's database
        $course = $_SESSION["U-record"][5];
        //get course record from course database
        $courseRecord = $courseFile->getRowKeyword(trim($course));
        $teacherCourseId = explode($courseFile->getSeparator(), $courseRecord)[0];
        
        //get all students that have the same id as the teacher's from student-course.txt
        $filteredstudent_course = $student_course_File->getAllKeyword(2,$teacherCourseId); 
        $studentFile = new File("../Database/users.txt");
        print_r($filteredstudent_course);
        $filteredstudents = $studentFile->getAllKeyword(5,$filteredstudent_course[1]);

        
        //convert record to student object and fill it in array $studentsObjArray
        $studentsObjArray = array();
        foreach($filteredstudent_course as $a){
            $studentRecord = $studentFile->getIdRow($a[1]);
            //print_R($studentRecord)."===";
            $student = new Student($studentRecord);
            array_push($studentsObjArray, $student);
        }

        //display the content in table
        for($i=0;$i<count($studentsObjArray);$i++)
        {
            echo '<tr><td>'.$studentsObjArray[$i]->getId().'</td><td>'.$studentsObjArray[$i]->getName().'</td><td>'.$studentsObjArray[$i]->getEmail().'</td><td>'.$studentsObjArray[$i]->getGrade().'</td><td><a href="../Model/removeRecord.php?source=../Views/manageStudents.php&destination=../Database/student-course.txt&index=1&id='.$studentsObjArray[$i]->getId().'">Remove</a></td></tr>';
        }
        ?>
</table>

<?php 
    echo '<br><a href="../Views/dashboard.view.php">Return to dashboard</a>';
    require_once "../Views/footer.php";
?>  