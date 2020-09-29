<?php

if($method == "GET") header("Location: /webskills/main.php");
else {
	if(isset($_POST["email"])) {
		$email = $_POST["email"];

		$conn = mysqli_connect(
			"localhost",
			"root",
			"",
			"people"
		);

		$sql = "select Email, Name, Birth, Img from person where Email='$email';";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_row($result);

	}else header("Location: /webskills/main.php");
};

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<div id="info">
		<img src="" alt="">
		<li id="email"></li>
		<li id="name"></li>
		<li id="birth"></li>
	</div>
</body>
</html>