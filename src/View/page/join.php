<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>php_skills</title>
  <link rel="stylesheet" href="./public/css/login.css">
  <script src="./public/js/join.js"></script>
</head>
<body>
  <div class="center">
    <form action="/joinAction" method="POST" class="join_form" id="join_form" enctype="multipart/form-data">
      <div class="emailBox">
        <input type="text" placeholder="이메일" id="id" name="id">
        <div id="validateEmail">중복된 이메일입니다.</div>
      </div>
      <input type="password" placeholder="비밀번호" id="pass" name="pass">
      <input type="password" placeholder="비밀번호 체크" id="pass_check" name="pass_check">
      <input type="text" placeholder="이름" id="name" name="name">
      <input type="text" placeholder="생년월일" id="birth" name="birth">
      <input type="file" placeholder="프로필 이미지" id="profile" name="profile" accept=".jpg, .png, .gif">
      <canvas id="code_cvs" width="300" height="50"></canvas>
      <input type="text" placeholder="캡챠" id="code" name="code">
      <input type="submit" value="회원가입">
      <a href="/">로그인</a>
    </form>
  </div>
</body>
</html>

<?php
// function email() {
//   $user = DB::fetch("SELECT * FROM users WHERE email = ?",[$_POST["id"]]);
//   function get_result() {
//     global $user;
//     return $user;
//   };

//   if($user) {
//     print_r(json_encode(get_result));
//   }

// }
?>