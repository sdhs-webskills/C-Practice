<?php

$email = $_POST["email"];

$conn = mysqli_connect(
	"localhost",
	"root",
	"",
	"people"
);
$sql = "select * from person where Email='$email';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

if($row) {
	echo(json_encode(array(
		"message" => "duplicate"
	)));
}else{
	echo(json_encode(array(
		"message" => "not duplicate"
	)));
};

?>