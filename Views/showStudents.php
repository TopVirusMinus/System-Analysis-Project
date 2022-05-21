<?php
    function showAllStudentsTable($recordArr, $id){
        echo "<table border=2px>";
        echo "
        <tr>
            <td>Student id</td>
            <td>Student name</td>
            <td>Student email</td>
            <td>Student Grade</td>
            <td>Add to course</td>
        </tr>
        ";
        foreach($recordArr as $record){
            echo "<br>";
            echo "<tr>";
            echo '<td>'.$record[0].'</td>';
            echo '<td>'.$record[2].'</td>';
            echo '<td>'.$record[3].'</td>';
            echo '<td>'.$record[4].'</td>';
            echo $add = '<td><a href="../Model/addCourseToStudent.php?studentId='.$record[0].'&teacherId='.$id.'">Add</a></td></td></tr>';
        }    
        echo "</table>";
    }

?>