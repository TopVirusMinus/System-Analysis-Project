<?php
    session_unset();
    session_destroy();
    header("location:../Controllers/login.control.php");
?>