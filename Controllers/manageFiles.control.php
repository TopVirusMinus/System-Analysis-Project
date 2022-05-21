<?php
    echo '<a href="../Controllers/dashboard.control.php">Return to dashboard</a><br>';
    require_once "../Model/getDirectory.php";
    
    $fileArr = getDirectoryArray("../Database/");
    
    foreach($fileArr as $f){
        echo '<a href="'.$f->getDestination().'">'.$f->getDestination().'</a>';
        $f->drawtablefromfile("../Controllers/manageFiles.control.php",$f->getDestination());
    }
?>