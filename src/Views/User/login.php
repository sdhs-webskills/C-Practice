<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>얼굴책 로그인</title>
    <link rel="stylesheet" type="text/css" href="./common.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <h2 class="my-3">로그인</h2>
            <div class="col-10 offset-1">
                <form method="post" action="login.php">
                    <div class="form-group">
                        <label for="userid">Email</label>
                        <input type="email" class="form-control" id="userid" name="userid">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">로그인</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

session_start();

if(isset($_POST["userid"])) {
    $_SESSION["user"] = $_POST["userid"];
    
    header("Location: ../layout/header.php");
}

?>