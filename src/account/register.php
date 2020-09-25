<?php

include "function.php";

session_start();

if($_SESSION["login-whether"] == true) {
	alert("비회원만 사용 가능한 기능입니다.");

	echo "<script>document.location.href='/webskills/main.php';</script>";
}else {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$birthday = $_POST["birthday"];
	$img = $_FILES["img"]["name"];

	global $duplicate;
	$duplicate = false;

	$conn = mysqli_connect(
		"localhost",
		"root",
		"",
		"people"
	);

	Duplicate_check($email, $conn);
	register($email, $password, $name, $birthday, $img, $conn);

};


function Duplicate_check($email, $conn) {
	$sql = "select * from person where Email='$email';";
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
		// $sql = "insert into person values('$email', password('$password'), '$name', '$birthday', '$img')";
		// $result = mysqli_query($conn, $sql);

		$imgs = $_FILES["img"]["name"];

		$imgs = explode(".", $imgs);
		$img_nm = cut_email($email)."_profile_img.".$imgs[1];

		move_uploaded_file($_FILES["img"]["tmp_name"], "webskills/src/account/image/user/".$img_nm);
		echo file_exists($_FILES["img"]["tmp_name"]);
		// alert("회원가입 완료되었습니다");

		// echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
	}else {
		alert("중복된 이메일입니다.");

		echo "<script>document.location.href='/webskills/src/page/register.html';</script>";
	};
};

function cut_email($email) {
	$reg = '/@/';
	preg_match($reg, $email,  $match, PREG_OFFSET_CAPTURE);

	$result = substr($email, 0, $match[0][1]);

	return $result;
};

?>