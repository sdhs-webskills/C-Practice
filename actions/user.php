<?php

switch ($_POST['action']) {

    case 'login' :
        [
            'userid' => $userid,
            'password' => $pass,
        ] = $_POST;

        $user = fetch("SELECT * FROM users WHERE id = ? AND password = password(?)", [$userid, $pass]);

        access($user, "아이디 또는 비밀번호가 잘못되었습니다.");

        $_SESSION['user'] = $user;
        alert('로그인 되었습니다.');
        move('/');

        break;

    case 'join' :
        [
            'userid' => $userid,
            'password' => $pass,
            'password_chk' => $passchk,
            'username' => $username
        ] = $_POST;

        access($userid !== "" && $pass !== "" && $username !== "", "빈칸이 존재합니다.");
        access($pass == $passchk, "비밀번호 재입력의 값이 잘못되었습니다.");

        $sql = "INSERT INTO users(`id`, `name`, `password`) VALUES (?, ?, PASSWORD(?))";

        access(execute($sql, [$userid, $username, $pass]), "DB 에러");

        alert("회원가입 완료.");
        move("./login");

        break;

    default: break;
}