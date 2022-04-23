<?php
    session_start();
    $title = "Dashboard";
    require "../Views/header.php";
?>

<?php
    require_once "../Classes/Files.class.php";
    print_r($_SESSION);
    $usersFile = new File("../Database/users.txt", "~");
    $currUser = $usersFile->getIdRow($_SESSION["id"]);
    print_r($currUser);
   // echo "Hello ".$currUser[2];

    echo '<table style = "border: 1px solid black;">
        <tr style = "border: 1px solid black;">
            <th style = "border: 1px solid black;">First name</th>
            <th style = "border: 1px solid black;">Last name</th>
        </tr>
        <tr style = "border: 1px solid black;">
            <td style = "border: 1px solid black;">John</td>
            <td style = "border: 1px solid black;">Doe</td>
        </tr>
        <tr style = "border: 1px solid black;">
            <td style = "border: 1px solid black;">Jane</td>
            <td style = "border: 1px solid black;"\>Doe</td>
        </tr>
    </table>';
?>

<?php
    require "../Views/footer.php";
?>