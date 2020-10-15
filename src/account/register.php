<?php

include "function.php";
include "../core/DB.php";

use src\core\DB;

$method = $_SERVER["REQUEST_METHOD"];
session_start();

if($method == "GET") {
	if($_SESSION["login-whether"] == true) {
		alert("비회원만 사용 가능한 기능입니다.");

		echo "<script>document.location.href='/webskills/main.php';</script>";
	}else header("Location: /webskills/main.php");
}else{
	$email = $_POST["email"];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$birthday = $_POST["birthday"];
	$img = $_FILES["img"]["name"];

	register($email, $password, $name, $birthday, $img);
};

function register($email, $password, $name, $birthday, $img) {
	$img_path = "../account/image/user/";

	$imgs = $_FILES["img"]["name"];
	if($imgs) {

		$imgs = explode(".", $imgs);
		$img_nm = cut_email($email)."_profile_img.".$imgs[1];

		$sql_path = "../account/image/user/";
		$sql_img_path = $sql_path.$img_nm;

		DB::fetch("insert into person values('$email', password('$password'), '$name', '$birthday', '$sql_img_path', now());", []);

		move_uploaded_file($_FILES["img"]["tmp_name"], $img_path.$img_nm);
	}else {
		DB::fetch("insert into person(Email, Password, Name, Birth, Time) values('$email', password('$password'), '$name', '$birthday', now());", []);		
	};

	alert("회원가입 완료되었습니다");

	echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
};

function cut_email($email) {
	$reg = '/@/';
	preg_match($reg, $email,  $match, PREG_OFFSET_CAPTURE);

	$result = substr($email, 0, $match[0][1]);

	return $result;
};

?>