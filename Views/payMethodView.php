<?php
    function payMethodView($payMethod){
        foreach($payMethod as  $pay){
            echo '<a href ="../Model/doSetPayment.php?class='.$pay[3].'&location='.$pay[2].'">'.$pay[1].'</a><br><br>';
        }
    }
?>