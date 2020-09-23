<?php

$email = $_POST["email"];
$password = $_POST["password"];
$name = $_POST["name"];
$birthday = $_POST["birthday"];
$img = $_POST["img"];

$conn = mysqli_connect(
	"localhost",
	"root",
	"",
	"people"
);

global $duplicate;
$duplicate = false;

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
	}else {
		return false;
	};
};

Duplicate_check($email, $conn);
register($email, $password, $name, $birthday, $img, $conn);

if($_SERVER["REQUEST_METHOD"] === "POST") {
	var_dump($_POST);

	
};

?>