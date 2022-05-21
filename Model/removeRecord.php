<?php
    require_once "../Model/Classes/Files.class.php";
    print_r($_GET);
    echo  "<br>";
    //get student id from url
    $id = $_GET["id"];

    //open student-course.txt
    $File = new File($_GET["destination"]); 
    print_r($File->getDestination());
    //get course record from course name
    $File->deleteRecordbyKeyword($_GET["index"],$id);

    header("location:".$_GET["source"]);
?>