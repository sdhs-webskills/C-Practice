<?php

include_once("../../../src/App/Library.php");
include_once("../../../src/App/DB.php");

use Core\App\DB;
use Core\App\Library;

if (isset($_POST['userid'])) {
    [
        'userid' => $userid,
        'password' => $pass,
        'password_chk' => $passchk,
        'username' => $username
    ] = $_POST;

    Library::access($userid !== "" && $pass !== "" && $username !== "", "빈칸이 존재합니다.");
    Library::access($pass == $passchk, "비밀번호 재입력의 값이 잘못되었습니다.");

    $sql = "INSERT INTO users(`id`, `name`, `password`) VALUES (?, ?, PASSWORD(?))";

    Library::access(DB::execute($sql, [$userid, $username, $pass]), "DB 에러");

    Library::alert("회원가입 완료.");
    Library::move("./login.php");
}

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>얼굴책 가입</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <h2 class="my-3"></h2>
        <div class="col-10 offset-1">
            <form method="post" action="">
                <div class="row">
                    <label for="userid" class="col-sm-2col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="userid" name="userid" placeholder="email을 입력하세요">
                    </div>
                </div>
                <div class="row">
                    <label for="password" class="col-sm-2col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="비밀번호를 입력하세요">
                    </div>
                </div>
                <div class="row">
                    <label for="password_chk" class="col-sm-2col-form-label">Password Check</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password_chk" name="password_chk" placeholder="비밀번호를 확인해주세요">
                    </div>
                </div>
                <div class="row">
                <label for="username" class="col-sm-2col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">회원가입</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>