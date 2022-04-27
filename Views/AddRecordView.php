<?php
    print_r($_GET);
    echo "<br>";
    echo '<form action="../Functions/addRecordFunction.php?destination='.$_GET["destination"].'&source='.$_GET["source"].'" method="POST">';
    
    //get user record from id    
    echo '<input name = "newRecord" type="text"">'; 
    //display the record in the input
    echo '<button type="submit">Add</button>';

    echo "<br>";
?>