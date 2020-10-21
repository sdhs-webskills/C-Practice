<?php

include "../core/DB.php";

use src\core\DB;

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET") header("Location: /webskills/main.php");
else {
	if(isset($_POST["email"])) {
		session_start();

		$req = $_POST["email"];
		$res = $_SESSION["email"];

		DB::fetch("delete from friend_apply where Requester='$req' and Responser='$res';", []);
		DB::fetch("insert into friend values ('$req', '$res', now());", []);
	}else {
		print_r(json_encode(array(
			"message" => "bad requester"
		)));
	};
};

?>