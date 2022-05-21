<?php
    require_once "Account.class.php";
    require_once "IShowTable.interface.php";
    require_once "Files.class.php";
    require_once "Student.class.php";
    require_once "Course.class.php";
    require_once "GetAllKeyword.php";
    require_once "GetidRow.class.php";
    require_once "GetRowKeyword.class.php";
    require_once "GetAllKeyword.php";
    class Teacher extends Account implements IShowTable{
        protected $course;
        protected $myStudents = [];

        function __construct($record){
            $this->id = $record[0];
            $this->userType = $record[1];
            $this->name = $record[2];   
            $this->email = $record[3];
            $this->pass = $record[4];  

            //add course object to teacher
            $courseFile = new File("../Database/courses.txt");
            $courseFile->setGetFromFile(new GetRowKeyword());
            $courseRecord = $courseFile->executeget($record[5]);

            $this->course = new Course($courseRecord);
        
            //$this->fillStudents();
        }
        
        public function fillStudents(){
            //populate current teacher's students array
            $student_course_File = new File("../Database/student-course.txt");
            $studentFile = new File("../Database/users.txt");
            $student_course_File->setGetFromFile(new GetAllKeyword());
            //get all students that have the same id as the teacher's from student-course.txt
            $filteredstudent_course = $student_course_File->executeget(2,$this->course->getId()); 
            $studentFile = new File("../Database/users.txt");
            $studentFile->setGetFromFile(new GetidRow());
            print_r($filteredstudent_course);
            echo "<br>";
            echo "<br>";
            echo "<br>";
            
            //convert record to student object and fill it in array $studentsObjArray
            foreach($filteredstudent_course as $a){
                $studentRecord = $studentFile->executeget($a[1]);
                $student = new Student($studentRecord);
                print_r($student);
                array_push($this->myStudents, $student);
                echo "<br>";
                echo "<br>";
                
            }

            print_r($this);
        }

        
        public function setCourse($course)
        {
            $this->course = $course;
        }

        public function getCourse()
        {
            return $this->course;
        }                  
        
        public function setSingleStudent($student)
        {
            array_push($this->myStudents, $student);
        }
        
        public function getMyStudents()
        {
            return $this->myStudents;
        }
        public function getSingleStudent($i)
        {
            return $this->myStudents[$i];
        }

        public function showTable($add = 0, $remove = 0){
            echo "
                <table border=2px>
                <tr>
                    <td>Student id</td>
                    <td>Student name</td>
                    <td>Student email</td>
                    <td>Student Grade</td>
                </tr>
            ";
            echo '<h1>My Students</h1>';


             //separate

             //populate current teacher's students array
             $student_course_File = new File("../Database/student-course.txt");
             $studentFile = new File("../Database/users.txt");
            $student_course_File->setGetFromFile(new GetAllKeyword());
            $studentFile->setGetFromFile(new GetidRow());
             //get all students that have the same id as the teacher's from student-course.txt
             $filteredstudent_course = $student_course_File->executeget(2,$this->course->getId()); 
             
             
             //convert record to student object and fill it in array $studentsObjArray
             foreach($filteredstudent_course as $a){
                $studentRecord = $studentFile->executeget($a[1]);
                //print_r($studentRecord);
                echo '<tr><td>'.$studentRecord[0].'</td>.<td>'.$studentRecord[2].'</td><td>'.$studentRecord[3].'</td><td>'.$studentRecord[5].'</td>';
                if($add == 1){
                    echo'<td><a href="../Model/addCourseToStudent.php?studentId='.$studentRecord[0].'&teacherId='.$this->id.'">Add</a>';
                }
                if($remove == 1){
                    echo '</td><td><a href="../Model/removeRecord.php?source=../Controllers/manageStudents.control.php&destination=../Database/student-course.txt&index=1&id='.$studentRecord[0].'">Remove</a></td>';
                }

                echo '</tr>';
            }
        }
            
    }
?>