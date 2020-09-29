<?php

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET") {
	session_start();

	if(isset($_SESSION["email"])) {
		$conn = mysqli_connect(
			"localhost",
			"root",
			"",
			"people"
		);

		$email = $_SESSION["email"];
		$sql = "select Responser, Request_Date from friend_apply where Requester='$email';";
		$result = mysqli_query($conn, $sql);

		global $arr;
		$arr = [];

		while($row = mysqli_fetch_row($result)) {
			array_pusy($arr, $row);
		};
	}else header("Location: /webskills/main.php");
}else {
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

		$check = false;
		$check_sql = "select Responser from friend_apply where Requester='$requester';";
		$check_result = mysqli_query($conn, $check_sql);

		while($check_row = mysqli_fetch_row($check_result)) {
			global $check;
			if($check_row[0] == $responser) {
				$check = true;
				break;
			}else continue;
		};

		if($check == false) {
			global $conn;
			$sql = "insert into friend_apply values('$requester', '$responser', now());";
			$result = mysqli_query($conn, $sql);

			echo(json_encode(array(
				"message" => $result
			)));
		}else{
			echo(json_encode(array(
				"message" => "false"
			)));
		};
		
	}else header("Location: /webskills/main.php");
};

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<div class="box">
		<div class="img"></div>
		<div class="name"></div>
		
	</div>
</body>
</html>