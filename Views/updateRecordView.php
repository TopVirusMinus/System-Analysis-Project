<?php
    print_r($_GET);
    echo "<br>";
    require_once "../Model/Classes/Files.class.php";
    require_once "../Model/Classes/GetidRow.class.php";
    
    echo '<form action="../Model/updateRecordFunction.php?destination='.$_GET["destination"].'&source='.$_GET["source"].'" method="POST">';
    
    //get user record from id
    $userFile = new File($_GET["destination"]);
    $userFile->setIGetFromFile(new GetidRow());
    $userRecord = $userFile->executeget($_GET["id"]);
    
    $userRecordString = implode($userFile->getSeparator(), $userRecord);
    echo '<input name = "newRecord" type="text" value="'.$userRecordString.'">'; 
    //display the record in the input
    echo '<button type="submit">Update</button>';

    echo "<br>";
    echo "<br>";
?>
