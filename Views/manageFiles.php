<?php
    echo '<a href="../Views/dashboard.view.php">Return to dashboard</a><br>';
    require_once "../Controllers/Files.class.php";
    $path    = '../Database/';
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..'));

    $fileArr = array();
    foreach($files as $f){
        $file = new File("../Database/".trim($f));
        array_push($fileArr, $file);
    }
    
    foreach($fileArr as $f){
        echo '<table border="2px">';
        echo '<a href="'.$f->getDestination().'">'.$f->getDestination().'</a>';
        $f->drawtablefromfile("../Views/manageFiles.php",$f->getDestination());
        echo "</table>";
    }
?>