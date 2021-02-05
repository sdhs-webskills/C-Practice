<?php

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="/webskills/src/resources/css/login.css">
    <script src="/webskills/src/resources/js/login.js"></script>
</head>
<body>
<div>
    <form method="post" action="/webskills/src/user/account/login" name="login">
        <input type="text" name="email"><br>
        <input type="password" name="password"><br>
        <button type="submit">로그인</button>
    </form>

    <button><a href="/webskills/src/user/account/register">회원가입</a></button>
</div>
</body>
</html>
