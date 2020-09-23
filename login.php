<?php

$id = $_POST["email"];
$password = $_POST["password"];

$conn = mysqli_connect(
	"localhost",
	"root",
	"",
	"people"
);

login($id, $password, $conn);

function login($id, $password, $conn) {
	$sql = "select * from person where id = '".$id."', '".$password."';";
	$result = mysqli_query($conn, $sql);

	header('Location: /webskills/main.html');
};

?>