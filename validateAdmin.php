<?php
    $login_id = $_GET['login-id-input'];
    // $login_type = $_GET['login-type'];
    
    setcookie('login-id-input', $login_id, time()+60*60*7);
    // setcookie('login-type', $login_type, time()+60*60*7);
    
    session_start();
    
    $_SESSION['login-id-input'] = $login_id;
    // $_SESSION['login-type'] = $login_type;
    
    header("location:select.php");
?>