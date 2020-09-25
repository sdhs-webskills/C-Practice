<?php

session_start();

$_SESSION["email"] = "";
$_SESSION["login-whether"] = false;

header("Location: /webskills/login.html");

?>