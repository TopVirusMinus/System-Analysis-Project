<?php
    session_start();
    $title = "Manage Users";
    require_once "header.php";
?>

<?php            
        echo 
        "<table border=2px>
            <tr>
                <td>User id</td>
                <td>User type</td>
                <td>Username</td>
                <td>User email</td>
                <td>User password</td>
            </tr>";
        require_once "../Controllers/Files.class.php";
        require_once "../Controllers/Student.class.php";
        
        $userFile = new File("../Database/users.txt");
        $userFile->displayAllUserTable();
?>
</table>

<?php
    echo '<br><a href="../Views/view.control.php">Return to dashboard</a>';
    require_once "footer.php";
?>