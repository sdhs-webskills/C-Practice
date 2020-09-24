<?php

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
	$sql = "select * from person where Email='$email' and Password=password('$password');";
	$result = mysqli_query($conn, $sql);

	if($result) {
		session_start();

		$_SESSION["email"] = $email;
		$_SESSION["login-whether"] = true;
	};

	header('Location: /webskills/main.html');
};

?>