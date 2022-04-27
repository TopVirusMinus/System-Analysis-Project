<?php
    echo '<a href="../Controllers   /dashboard.control.php">Return to dashboard</a><br>';
    require_once "../Classes/Files.class.php";
    $path    = '../Database/';
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..'));

    $fileArr = array();
    foreach($files as $f){
        $file = new File("../Database/".trim($f), "~");
        array_push($fileArr, $file);
    }
    
    foreach($fileArr as $f){
        echo '<table border="2px">';
        echo '<a href="#">'.$f->getDestination().'</a>';
        $f->drawtablefromfile("../Views/manageFiles.php",$f->getDestination());
        echo "</table>";
        echo "<br>";
    }


?>