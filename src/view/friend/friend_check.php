<?php

include "../core/DB.php";

use src\core\DB;
$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET") header("Location: /webskills/main.php");
else {
	if(isset($_POST["email"])) {
		session_start();

		$requester = $_SESSION["email"];
		$responser = $_POST["email"];

		$result = DB::fetch("select * from friend where Requester='$requester' and Responser='$responser';", []);

		$result2 = DB::fetch("select * from friend where Requester='$responser' and Responser='$requester';", []);

		if($result || $result2) print_r(json_encode(true));
		else print_r(json_encode(false));
	}else header("Location: /webskills/main.php");
};

?>