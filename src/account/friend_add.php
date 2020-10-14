<?php

include "../core/People.php";

use src\core\people;

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET") header("Location: /webskills/main.php");
else {
	if(isset($_POST["email"])) {
		session_start();

		$req = $_POST["email"];
		$res = $_SESSION["email"];

		$result = people::fetch("delete from friend_apply where Requester='$req' and Responser='$res';", []);

	}else {
		print_r(json_encode(array(
			"message" => "bad requester"
		)));
	};
};

?>