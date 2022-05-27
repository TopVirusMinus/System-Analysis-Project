<?php
    require_once ("IRegister.interface.php");
    class StudentRegister implements IRegister{
        public function show(){
            echo '<input type="text" name="grade" placeholder="Enter Grade">';
            echo '<input type="hidden" name="paid" value="-1">';
            echo '<br><br>';
        }

    }