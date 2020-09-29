<?php

include "src/account/function.php";

session_start();

if($_SESSION["login-whether"] == true) {

}else{
	alert("로그인한 회원만 접근 가능합니다");
	
	echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
};

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>index</title>
</head>
<body>
	<button name="logout"><a href="/webskills/src/account/logout.php">로그아웃</a></button>
	<button name="search"><a href="/webskills/src/account/search.php">유저 검색</a></button>
	<button name="friend_apply"><a href="/webskills/src/account/friend_apply.php">친구 요청 페이지</a></button>
</body>
</html>