<?php
    session_start();
    session_unset();
    session_destroy();
    $title = "Login";
    require_once "../Views/header.php";
?> 

<form action="../Model/dologin.php" method="POST">
    <input type="email" required name="email" placeholder="Enter Email" id="">
    <br>
    <br>
    <input type="password" required name="Password" placeholder="Enter Password" id="">
    <br>
    <br>
    <button type="submit">Login</button>
</form>
<br>
<span>Dont have an account?</span>
<a href="register.control.php">Register</a>


<?php
require_once "../Views/footer.php";
?>
