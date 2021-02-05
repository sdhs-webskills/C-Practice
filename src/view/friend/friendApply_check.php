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

		$sql = "select Responser from friend where Requester='$requester';";
		$result = mysqli_query($conn, $sql);

		$check = false;

		while($row = mysqli_fetch_row($result)) {
			global $check;
			if($row[0] == $responser) {
				$check = true;
				break;
			}else continue;
		};

		echo(json_encode($check));

	}else header("Location: /webskills/main.php");
};

?>