<?php
function registerFields($registerAttribArray, $userType){
    echo "<script> function onChange() {
        const password = document.querySelector('input[name=Password]');
        const confirm = document.querySelector('input[name=CPassword]');
        if (confirm.value === password.value) {
          confirm.setCustomValidity('');
        } else {
          confirm.setCustomValidity('Passwords do not match');
        }
      }
      </script>
      ";
    echo '<form action="../Model/doRegister.php" method="post">';
    echo '<br>';
    echo '<input type="hidden" name="u-type" value='.$userType.'>';
    echo '<input type="text" required name="uname" placeholder="Enter Username">';
    echo '<br><br>';
    echo '<input type="email" required name="email" placeholder="Enter Email Address">';
    echo '<br><br>';
    echo '<input type="password" required name="Password" onChange="onChange()" placeholder="Enter Password">';
    echo '<br><br>';
    echo '<input type="password" required name="CPassword" onChange="onChange()" placeholder="Confirm Password">';
    echo '<br><br>';
    
    require_once $registerAttribArray[1];
    $registerView = new $registerAttribArray[2];
    $registerView->show();
    
    echo '<button type="submit">Register</button>';
    echo '<br><br>';
    
    echo '</form>';
}
    