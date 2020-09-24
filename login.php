<?php

include "function.php";

$email = $_POST["email"];
$password = $_POST["password"];

$conn = mysqli_connect(
	"localhost",
	"root",
	"",
	"people"
);

login($email, $password, $conn);

function login($email, $password, $conn) {
	$id_check = false;
	$pw_check = false;

	$sql = "select * from person where Email='$email' and Password=password('$password');";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_row($result);

	if($row) {
		session_start();

		$_SESSION["email"] = $email;
		$_SESSION["login-whether"] = true;

		header('Location: /webskills/main.php');
	}else{
		$sql = "select * from person where Email='$email';";
		$result = mysqli_query($conn, $sql);
		$email_row = mysqli_fetch_row($result);

		session_start();

		$_SESSION["email"] = "";
		$_SESSION["login-whether"] = false;

		if($email_row) {
			alert("비밀번호를 확인해주세요.");

			echo "<script>document.location.href='/webskills/login.html';</script>";
		}else {
			alert("존재하지않는 아이디입니다.");

			echo "<script>document.location.href='/webskills/register.html';</script>";
		};
	};
};

?>