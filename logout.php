<?php

session_start();

unset($_SESSION["login-id-input"]);


header('Location: index.php'); // default page
?>