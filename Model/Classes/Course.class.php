<?php
    require_once "Account.class.php";
    require_once "Files.class.php";
    require_once "GetidRow.class.php";
    require_once "GetRowKeyword.class.php";
    require_once "../Database/teacher-course.txt";
    class Course{
        protected $year = -1;
        protected $room;
        //protected $teacher;

        function __construct($record)
        {
            //echo "<br>";
            //echo "<br>";
            //print_r($record);
            $this->id = $record[0];
            $this->name = $record[1];
            $this->year= $record[2];
            
            $course_roomFile = new File("../Database/course-room.txt");
            $course_roomFile->setIGetFromFile(new GetRowKeyword());
            $courseRoomRecord = $course_roomFile->executeget($this->id, 1);
            $roomFile = new File("../Database/rooms.txt");
            $roomFile->setIGetFromFile(new GetidRow());
            $roomRecord = $roomFile->executeget($courseRoomRecord[2]);
            //echo "<br>";
            //print_r($this->id);
            //echo "<br>";
            //print_r($courseRoomRecord);
            $this->room = $roomRecord[1];
        }

        public function setRoom($room){
            $this->room = $room;
        }
        
        public function getRoom(){
            return $this->room;
        }
        
        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }
        
        public function setName($name){
            $this->name = $name;
        }

        public function getName(){
            return $this->name;
        }
        
        public function setYear($year){
            $this->year = $year;
        }

        public function getYear(){
            return $this->year;
        }
        
    }
?>