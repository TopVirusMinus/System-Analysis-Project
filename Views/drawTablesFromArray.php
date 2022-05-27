<?php
    function drawTablesFromArray($fileArr){    
        foreach($fileArr as $f){
            echo "<br>";
            echo "<br>";
            echo '<a href="'.$f->getDestination().'">'.$f->getDestination().'</a>';

            $f->drawtablefromfile("../Controllers/manageFiles.control.php",$f->getDestination());
        }
    }
?>