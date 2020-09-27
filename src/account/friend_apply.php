<?php

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET") header("Location: /webskills/main.php");
else {
	if(isset($_POST["email"])) {
		session_start();

		$requester = $_SESSION["email"];
		$responser = $_POST["email"];

		$conn = mysqli_connect(
			"localhost",
			"root",
			"",
			"people"
		);
		$sql = "insert into friend_apply values('$requester', '$responser', now();";
		$result = mysqli_query($conn, $sql);

		echo(json_encode(array(
			"message" => $result
		)));
	}else header("Location: /webskills/main.php");
};

?>