<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul>
    <li><a href="/">HOME</a></li>
    <?php if (isset($_SESSION['user'])) { ?>
        <li><?php echo $_SESSION['user']->name?>님 환영합니다.</li>
        <li><a href="/user/logout">로그아웃</a></li>
    <?php } else { ?>
        <li><a href="/user/login">로그인</a></li>
        <li><a href="/user/join">회원가입</a></li
    <?php } ?>
</ul>