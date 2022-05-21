<?php
    function generateLinks($permArr){
        foreach($permArr as $subArray){
                echo '<a href="'.$subArray[1].'">'.$subArray[2].'</a><br>';
        }
    }
?>