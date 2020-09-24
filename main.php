<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>index</title>
</head>
<body>
	<form method="post" action="/login.php" name="login">
		<input type="text" name="id"><br>
		<input type="password" name="password">
		<input type="submit">
	</form>
	<form method="post" action="/register.php">
		<input type="text" name="email">
		<input type="password" name="password">
		<input type="password" name="password-check">
		<input type="text" name="name">
		<input type="text" name="birthday">
		<input type="file" name="img">
		<img src="">
		<input type="text" name="cap-cha">
	</form>
</body>
</html>