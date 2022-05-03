<?php
    print_r($_GET);
    echo "<br>";
    require_once "../Classes/Files.class.php";
    echo '<form action="../Functions/updateRecordFunction.php?destination='.$_GET["destination"].'&source='.$_GET["source"].'" method="POST">';
    
    //get user record from id
    $userFile = new File($_GET["destination"], "~");
    $userRecord = $userFile->getIdRow($_GET["id"]);
    
    $userRecordString = implode($userFile->getSeparator(), $userRecord);
    echo '<input name = "newRecord" type="text" value="'.$userRecordString.'">'; 
    //display the record in the input
    echo '<button type="submit">Update</button>';

    echo "<br>";
    echo "<br>";
?>c
