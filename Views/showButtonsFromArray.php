<?php 
    function showButtonsFromArray($allRecords2D, $value = 0, $text = 1){
        foreach ($allRecords2D as $r){
            echo '<button type="submit" name="user-type" value="'.$r[$value].'">'.$r[$text].'</button>';
        }
    }