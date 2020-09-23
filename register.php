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

$duplicate = false;

function Duplicate_check($name, $conn) {
	$sql = "select * from person;";
	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)) {
		if($name == $row['Name']) {
			$duplicate = true;
			return $duplicate;
		};
	};
};

Duplicate_check($name, $conn);
register($email, $password, $name, $birthday, $img, $duplicate, $conn);

function register($email, $password, $name, $birthday, $img, $duplicate, $conn) {
	$sql = "insert into person values('".$email."', '".$password."', '".$name."', '".$birthday."', '".$img."')";
	$result = mysqli_query($conn, $sql);

	$sql = "select * from person";
	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)) {
		print_r($row);
	};
};

?>