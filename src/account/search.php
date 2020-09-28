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
		session_start();

		$conn = mysqli_connect(
			"localhost",
			"root",
			"",
			"people"
		);

		$email = $_SESSION["email"];

		$kind = $_POST["kind"];
		$value = $_POST["value"];

		$email_sql = "select Email from person where Email='$email';";
		$email_result = mysqli_query($conn, $email_sql);
		$email_row = mysqli_fetch_row($email_result);

		$sql = "select Email, Name, Birth, Img from person where $kind='$value';";
		$result = mysqli_query($conn, $sql);

		if($result == false) {
			echo(json_encode(array(
				"message" => "fail to search user"
			)));
		}else {
			$arr = [];
			while($row = mysqli_fetch_row($result)) {
				if($row[0] == $email_row[0]) continue;
				array_push($arr, $row);
			};
			print_r(json_encode($arr));
		};
	}else header("Location: /webskills/main.php");
};

?>