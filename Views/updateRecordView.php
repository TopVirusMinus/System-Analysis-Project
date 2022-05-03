<?php
    print_r($_GET);
    echo "<br>";
    require_once "../Classes/Files.class.php";
    echo '<form action="../Functions/updateRecordFunction.php" method="POST">';
    
    //get user record from id
    $userFile = new File("../Database/users.txt", "~");
    $userRecord = $userFile->getIdRow($_GET["id"]);
    
    //display the record in the input
    $userRecordString = implode($userFile->getSeparator(), $userRecord);
    echo '<input style="width: 500px;" "type="text" required name="record" value='.$userRecordString.' placeholder="Enter Email Address" id="">';

    echo '<button type="submit">Update</button>';

    echo "<br>";
    print_r($userRecord);
    echo "<br>";
?>