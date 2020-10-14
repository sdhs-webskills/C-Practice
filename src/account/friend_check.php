<?php

include "../core/People.php";

use src\core\people;
$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET") header("Location: /webskills/main.php");
else {
	if(isset($_POST["email"])) {
		session_start();

		$requester = $_SESSION["email"];
		$responser = $_POST["email"];

		$result = people::fetch("select * from friend where Requester='$requester' and Responser='$responser';", []);

		$result2 = people::fetch("select * from friend where Requester='$responser' and Responser='$requester';", []);

		if($result) print_r(json_encode($result));
		else if($result2) print_r(json_encode($result2));
		else {
			print_r(json_encode(array(
				"message" => "nothing to search"
			)));
		};
	}else header("Location: /webskills/main.php");
};

?>