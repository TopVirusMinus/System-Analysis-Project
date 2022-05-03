<?php
    class Time{
        protected $hour = -1;
        protected $minute = -1;

        function __construct($hour, $minute)
        {
            $this->hour = $hour;
            $this->minute = $minute;
        }

        public function setHour($hour){
            $this->hour = $hour;
        }
        public function setMinute($minute){
            $this->minute = $minute;
        }
        public function getHour(){
            return $this->hour;
        }
        public function getMinute(){
            return $this->minute;
        }
    }
?>