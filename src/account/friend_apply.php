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