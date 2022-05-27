<?php
    require_once ("IRegister.interface.php");
    class TeacherRegister implements IRegister{
        public function show(){
            echo '<input type="text" name="course" placeholder="Enter Course Given">';
            echo '<br><br>';
        }

    }