<?php
    session_start();
    $title = "Manage Users";
    require_once "header.php";
?>

<table border=2px>
    <tr>
        <td>User id</td>
        <td>User type</td>
        <td>Username</td>
        <td>User email</td>
        <td>User password</td>
    </tr>
    <?php
        require_once "../Classes/Files.class.php";
        require_once "../Classes/Student.class.php";
        
        $userFile = new File("../Database/users.txt", "~");
        
        $allRecords = $userFile->getAllRecords();
        //get all records   
        //print_r($allRecords);
        
        //convert record to student object and fill it in array $studentsObjArray
        $studentsObjArray = array();
        foreach($allRecords as $a){
            print_r($a);
            $studentRecord = $userFile->getIdRow($a[0]);
            if($studentRecord[1] != 3){
                $student = new Account($studentRecord);
                array_push($studentsObjArray, $student);
            }
        }

        //display the content in table
        for($i=0;$i<count($studentsObjArray);$i++)
        {
            echo '<tr><td>'.$studentsObjArray[$i]->getId().'</td><td>'.$studentsObjArray[$i]->getUserType().'</td><td>'.$studentsObjArray[$i]->getName().'</td><td>'.$studentsObjArray[$i]->getEmail().'</td><td>'.$studentsObjArray[$i]->getPass().'</td><td><a href="../Functions/removeRecord.php?source=../Views/manageUsers.php&destination=../Database/users.txt&id='.$studentsObjArray[$i]->getId().'">Remove</a><td><a href="../Functions/updateRecord.php?id='.$studentsObjArray[$i]->getId().'">Update</a></td></tr>';
        }
?>
</table>

<?php
    echo '<br><a href="../Controllers/dashboard.control.php">Return to dashboard</a>';
    require_once "footer.php";
?>