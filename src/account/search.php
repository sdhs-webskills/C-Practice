<?php

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET") header("Location: /webskills/main.php");
else {
	if(isset($_POST["sql"])) {
		$conn = mysqli_connect(
			"localhost",
			"root",
			"",
			"people"
		);

		$sql = $_POST["sql"];
		$result = mysqli_query($conn, $sql);

		if($result == false) {
			echo(json_encode(array(
				"message" => "fail to search user"
			)));
		}else {
			$arr = [];
			while($row = mysqli_fetch_object($result)) {
				array_push($arr, $row);
			};
			print_r(json_encode($arr));
		};
	}else header("Location: /webskills/main.php");
};

?>