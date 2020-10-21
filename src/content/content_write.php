<?php

include "../account/function.php";
include "../core/DB.php";

use src\core\DB;

$method = $_SERVER["REQUEST_METHOD"];

session_start();

$email = $_SESSION["email"];
$idx = 0;

if($method == "GET") {
	if(!$email) {
		alert("로그인한 유저만 접근 가능합니다");

		echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
	};
}else{
	extract($_POST);
	if($content) {
		$arr = explode("@", $email);
		add_post($arr[0], $idx);

		// echo "<script>document.location.href='/webskills/src/account/profile.php';</script>";
	};
};

function add_post($str, $index) {
	global $email, $title, $content;

	$result = DB::fetchAll("select * from content where Writer='$email';", []);
	$id = $str."_".sizeof($result);
	DB::fetch("insert into content_writer values('$email', '$id');", []);
	DB::fetch("insert into content values('$email', '$title', '$content', now(), 'N', '$id');", []);

	$sc = scandir("../account/image/user/".explode("@", $email)[0]);

	if(!$sc) mkdir("../account/image/user/".explode("@", $email)[0]);

	mkdir("../account/image/user/".explode("@", $email)[0]."/".$id);

	$img_path = "../account/image/user/".explode("@", $email)[0]."/".$id."/";
	$imgs = $_FILES["img"]["name"];

	if($imgs) {
		$imgs = explode(".", $imgs);
		$img_nm = cut_email($email)."_profile_img.".$imgs[1];

		$sql_path = "../account/image/user/".cut_email($email)."/";
		$sql_img_path = $sql_path.$img_nm;

		move_uploaded_file($_FILES["img"]["tmp_name"], $img_path.$img_nm);
	};
};
function cut_email($email) {
	$reg = '/@/';
	preg_match($reg, $email,  $match, PREG_OFFSET_CAPTURE);

	$result = substr($email, 0, $match[0][1]);

	return $result;
};

date_default_timezone_set("Asia/Seoul");

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/content_write.css">
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
		<input type="file" placeholder="이미지" name="img" multiple>
		<button>등록하기</button>
	</form>
</body>
</html>
