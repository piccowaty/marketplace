<?php
    session_start();
    $_SESSION['login'] = "";
    header('location:login.php');
?>