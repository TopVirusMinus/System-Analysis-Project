<?php
    require_once "Account.class.php";
    require_once "IShowTable.interface.php";
    require_once "Files.class.php";
    require_once "Course.class.php";

    class Student extends Account implements IShowTable{
        protected  $grade = -1;
        protected  $cumulativeScore = -1;
        protected  $Courses=array();

        function __construct($record){
            if($record){
                $this->id = $record[0];
                $this->userType = $record[1];
                $this->name = $record[2];
                $this->email = $record[3];
                $this->pass = $record[4];
                $this->grade = $record[5];
                
                $courses = $this->getAllCourses();
                //print_r($courses);    

                foreach($courses as $c){
                    $courseObj = new Course($c);
                    array_push($this->Courses, $courseObj);
                }
            }
        }
        
        public function getAllCourses(){
            $student_courseFile = new File("../Database/student-course.txt");
            $courseFile = new File("../Database/courses.txt");
            $studentCourseRecord = $student_courseFile->getAllKeyword(1, $this->id);
            $myCourses  = array();
            //print_r($studentCourseRecord);

            foreach($studentCourseRecord as $scr){
                $courseRecord = $courseFile->getIdRow($scr[2]);
                array_push($myCourses, $courseRecord);
            }

            return $myCourses;

        }

        public function setGrade($grade){
            $this->grade = $grade;
        }

        public function setSingleTeacher($Teacher){
            array_push($this->Teachers, $Teacher);
        }
        public function setSingleCourse($Courses){
            array_push($this->Courses, $Courses);
        }

        public function getSingleTeacher($index){
            if($index < count($this->Teachers)){
                return $this->Teachers[$index];
            }
            else{
                echo "Teacher index out of range";
            }
        }
        public function getSingleCourse($index){
            if($index < count($this->Courses)){
                return $this->Courses[$index];
            }
            else{
                echo "Course index out of range";
            }   
        }
        
        public function getGrade(){
            return $this->grade;
        }

        public function setCumulativeScore($cumulativeScore){
            $this->cumulativeScore = $cumulativeScore;
        }
        
        public function getCumulativeScore(){
            return $this->cumulativeScore;
        }
        
        public function showTable(){
            echo "
                <table border=2px>
                <tr>
                    <td>Course name</td>
                    <td>Course Room</td>
                </tr>
            ";
            foreach($this->Courses as $c){
                echo '<tr><td>'.$c->getName().'</td><td>'.$c->getRoom().'</td></tr>';
            }
        }
            
    }
?>