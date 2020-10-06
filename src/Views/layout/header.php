<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header class="header">
            
        </header>
        <?php if (isset($_SESSION["err"])) :?>
        <div class="alert <?=$_SESSION["err"]["css"] ?> out">
            <?= $_SESSION["err"]["msg"] ?>
        </div>
        <?php unset($_SESSION["err"]);?>
        <?php endif; ?>
    </div>
    <?php if (isset($_SESSION["user"])) : ?>
    <div>
        <button class="btn btn-primary"><?=$_SESSION["user"]?></button>
        <a href="../User/login.php" class="btn btn-danger">로그아웃</a>
    </div>
    <?php else: ?> 
    <div>
        <a href="../User/join.php" class="btn btn-danger">회원가입</a>
        <a href="../User/login.php" class="btn btn-primary">로그인</a>
    </div>
    <?php endif; ?>
</body>
</html>