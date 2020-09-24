<?php

include "function.php";

session_start();

if($_SESSION["login-whether"] == true) {

}else{
	alert("로그인한 회원만 접근 가능합니다");
	
	header("Location: /webskills/login.html");
};

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>index</title>
</head>
<body>
	<button name="logout"><a href="/webskills/logout.php">로그아웃</a></button>
</body>
</html>