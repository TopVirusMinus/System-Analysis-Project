<?php
    require_once "../Controllers/Files.class.php";
    print_r($_GET);
    echo  "<br>";
    //get student id from url
    $id = $_GET["id"];

    //open student-course.txt
    $File = new File(trim($_GET["destination"])); 
    print_r(trim($File->getDestination()));
    //get course record from course name
    $File->deleteRecordbyKeyword($_GET["index"],$id);

    header("location:".$_GET["source"]);
?>