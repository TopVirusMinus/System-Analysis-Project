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
    $currUser = $usersFile->getIdRow($_SESSION["id"]);

<<<<<<< HEAD
    print_r($currUser);
    echo '<br>'.'<h2 style="color: #3C1FFF">Hello '.$currUser[2].'</h2><br>';
=======
    //print_r($currUser);
    echo "<br>"."Hello ".$currUser[2]."<br>";
>>>>>>> 4f31476f73973a39791dd1ad6dc0d03bd3908b71




    $permissions = new File("../Database/permissions.txt", "~");
    $permArr = $permissions->getAllKeyword(0,$currUser[1]);
    
    //print_r($permArr);
    echo "<br>";

    foreach($permArr as $subArray){
        echo '<a href="'.$subArray[1].'">'.$subArray[2].'</a><br>';
    }

    // echo '<table style = "border: 1px solid black;"> 
    //     <tr style = "border: 1px solid black;">
    //         <th style = "border: 1px solid black;">First name</th>
    //         <th style = "border: 1px solid black;">Last name</th>
    //     </tr>
    //     <tr style = "border: 1px solid black;">
    //         <td style = "border: 1px solid black;">Folan</td>
    //         <td style = "border: 1px solid black;">El Folany</td>
    //     </tr>
    //     <tr style = "border: 1px solid black;">
    //         <td style = "border: 1px solid black;">3elan</td>
    //         <td style = "border: 1px solid black;"\>El 3elany</td>
    //     </tr>
    // </table>';
?>

<?php
    require "../Views/footer.php";
?>