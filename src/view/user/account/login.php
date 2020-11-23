<?php

include "function.php";
include "../core/DB.php";

use src\core\DB;

$email = $_POST["email"];
$password = $_POST["password"];

login($email, $password);

function login($email, $password) {
	$id_check = false;
	$pw_check = false;

	$result = DB::fetch("select * from person where Email='$email' and Password=password('$password');", []);

	if($result) {
		session_start();

		$_SESSION["email"] = $email;
		$_SESSION["login-whether"] = true;

		header('Location: /webskills/main.php');
	}else{
		$result = DB::fetch("select * from person where Email='$email';", []);

		session_start();

		$_SESSION["email"] = "";
		$_SESSION["login-whether"] = false;

		if($result) {
			alert("비밀번호를 확인해주세요.");

			echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
		}else {
			alert("존재하지않는 아이디입니다.");

			echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
		};
	};
};

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="/webskills/src/page/css/login.css">
    <script src="/webskills/src/page/js/login.js"></script>
</head>
<body>
<div>
    <form method="post" action="/webskills/src/account/login.php" name="login">
        <input type="text" name="email"><br>
        <input type="password" name="password"><br>
        <button type="submit">로그인</button>
    </form>

    <button><a href="/webskills/src/page/register.html">회원가입</a></button>
</div>
</body>
</html>
