<?php

include "function.php";

session_start();

if($_SESSION["login-whether"] == true) {
	alert("비회원만 사용 가능한 기능입니다.");
	header("Location: /webskills/main.php");
}else {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$birthday = $_POST["birthday"];
	$img = $_FILES["img"]["name"];

	global $duplicate;
	$duplicate = false;

	Duplicate_check($email, $conn);
	register($email, $password, $name, $birthday, $img, $conn);

};

$conn = mysqli_connect(
	"localhost",
	"root",
	"",
	"people"
);

function Duplicate_check($email, $conn) {
	$sql = "select * from person where Email='".$email."';";
	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)) {
		if($row) {
			global $duplicate;
			$duplicate = true;
		};
	};
};

function register($email, $password, $name, $birthday, $img, $conn) {
	global $duplicate;
	
	if($duplicate == false) {
		$sql = "insert into person values('".$email."', '".$password."', '".$name."', '".$birthday."', '".$img."')";
		$result = mysqli_query($conn, $sql);

		session_start();

		$imgs = $_FILES["img"]["name"];

		$imgs = explode(".", $imgs);
		$img_nm = cut_email($email)."_profile_img".".$imgs[1]";

		move_uploaded_file($_FILES["img"]["tmp-name"], "webskills/img/user/".$img_nm);
		alert("회원가입 되었습니다");

		header("Location: /webskills/login.html");
	}else {
		alert("중복되는 아이디입니다. 다른 아이디를 사용해주세요.");

		header("Location: /webskills/register.html");
	};
};

function cut_email($email) {
	$reg = '/@/';
	preg_match($reg, $email,  $match, PREG_OFFSET_CAPTURE);

	$result = substr($email, 0, $match[0][1]);

	return $result;
};

?>