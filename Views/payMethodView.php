<?php
    require_once "../Model/Classes/OriginalCost.class.php";
    require_once "../Model/Classes/PayByCash.class.php";
    require_once "../Model/Classes/PayByFawry.class.php";
    require_once "../Model/Classes/PayByCheque.class.php";

    function payMethodView($payMethod){
        foreach($payMethod as  &$pay){
            $pay = array_map('trim', $pay);
            $cost = new $pay[3](new OriginalCost);
            echo '<a href ="../Model/doSetPayment.php?class='.$pay[3].'&location='.$pay[2].'">'.$pay[1].'</a> Cost: '.$cost->getCost().'<br><br>';
        }
    }
?>