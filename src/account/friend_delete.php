<?php

include "../core/DB.php";

use src\core\DB;

$method = $_SERVER["REQUEST_METHOD"];

session_start();

$email = $_SESSION["email"];

if($method == "GET") header("Location: /webskills/main.php");
else {
	$target = $_POST["email"];
};

?>