<?php

    session_start();    
    $title = "Dashboard";
    require "../Views/header.php";
?>
<a href="../Functions/dologout.php">Log out</a>
<br>
<?php
    require_once "../Classes/Files.class.php";
    //print_r($_SESSION);
    $usersFile = new File("../Database/users.txt", "~");

    print_r($_SESSION);
    echo '<br>'.'<h2 style="color: #3C1FFF">Hello '.$_SESSION["U-record"][2].'</h2><br>';



    $permissions = new File("../Database/permissions.txt", "~");
    $permArr = $permissions->getAllKeyword(0,$_SESSION["U-record"][1]);
    
    //print_r($permArr);
    echo "<br>";

    foreach($permArr as $subArray){
        echo '<a href="'.$subArray[1].'">'.$subArray[2].'</a><br>';
    }
?>

<?php
    require "../Views/footer.php";
?>