<?php

include "../account/function.php";
include "../core/Board.php";

use src\core\Board;

$method = $_SERVER["REQUEST_METHOD"];

session_start();

$email = $_SESSION["email"];

if($method == "GET") {
	if(!$email) {
		alert("로그인한 유저만 접근 가능합니다");

		echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
	};
}else{
	extract($_POST);
	if($content) {
		$add_writer = Board::fetch("insert into writer values('$email', '$title');", []);
		$add_text = Board::fetch("insert into content values('$email', '$title', '$content', now(), 'N');", []);

		header("Location: /webskills/src/account/profile.php");
	};
};

date_default_timezone_set("Asia/Seoul");

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<script src="js/content_write.js"></script>
	<style>
		textarea{ resize: none; }
	</style>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
		<li>작성자 : <?= $email ?></li>
		<li>작성일 : <?= date("Y-m-d"); ?></li>
		<input type="text" name="title" placeholder="제목">
		<textarea name="content" id="" cols="30" rows="10" resize="none" placeholder="내용"></textarea>
		<input type="file" placeholder="이미지" multiple>
		<button>등록하기</button>
	</form>
</body>
</html>