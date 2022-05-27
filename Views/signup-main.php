<?php
function registerFields($registerAttribArray, $userType){
    echo '<form action="../Model/doRegister.php" method="post">';
    echo '<br>';
    echo '<input type="hidden" name="u-type" value='.$userType.'>';
    echo '<input type="text" required name="uname" placeholder="Enter Username">';
    echo '<br><br>';
    echo '<input type="email" required name="email" placeholder="Enter Email Address">';
    echo '<br><br>';
    echo '<input type="password" required name="Password" placeholder="Enter Password">';
    echo '<br><br>';
    echo '<input type="password" required placeholder="Confirm Password">';
    echo '<br><br>';
    
    require_once $registerAttribArray[1];
    $registerView = new $registerAttribArray[2];
    $registerView->show();
    
    echo '<button type="submit">Register</button>';
    echo '<br><br>';
    
    echo '</form>';
}
    