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

		$check_sql = "select Responser from friend_apply where Requester='$requester';";
		$check_result = mysqli_query($connn, $check_sql);
		
		
		$sql = "insert into friend_apply values('$requester', '$responser', now());";
		$result = mysqli_query($conn, $sql);

		echo(json_encode(array(
			"message" => $result
		)));
	}else header("Location: /webskills/main.php");
};

?>