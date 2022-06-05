<?php
    function getDirectoryArray($directory){
        require_once "../Model/Classes/Files.class.php";
        $path    = $directory;
        $files = scandir($path);
        $files = array_diff(scandir($path), array('.', '..'));

        $fileArr = array();
        foreach($files as $f){
            $file = new File("../Database/".$f);
            array_push($fileArr, $file);
        }
        return $fileArr;
    }  
?>