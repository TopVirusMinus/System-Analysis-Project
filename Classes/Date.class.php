<?php
    class Date{
        protected $day = '';
        protected $month = "";
        protected $year = 0;

        function __construct($day, $month, $year)
        {
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
        }

        public function setDay($day){
            $this->day = $day;
        }
        public function setMonth($month){
            $this->month = $month;
        }
        public function setYear($year){
            $this->year = $year;
        }

        public function getDay(){
            return $this->day;
        }
        public function getMonth(){
            return $this->month;
        }
        public function getYear(){
            return $this->year;
        } 
    }
?>