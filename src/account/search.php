<?php

include "function.php";

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET") {
	session_start();

	if($_SESSION["email"] && $_SESSION["email"] != "") {
		header("Location: /webskills/src/account/search.html");
	}else {
		alert("로그인한 유저만 접근 가능합니다");
		echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
	};
}else {
	if(isset($_POST["kind"])) {
		$conn = mysqli_connect(
			"localhost",
			"root",
			"",
			"people"
		);

		$kind = $_POST["kind"];
		$value = $_POST["value"];

		$sql = "select * from person where $kind='$value';";
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