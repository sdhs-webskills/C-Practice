<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>php_skills</title>
  <link rel="stylesheet" href="./src/css/login.css">
</head>
<body>
  <div class="center">
    <form action="/login" method="POST" class="login_form">
      <input type="text" placeholder="아이디(이메일)" id="id" name="id">
      <input type="password" placeholder="비밀번호" id="pass" name="pass">
      <input type="submit" value="로그인">
      <a href="/join">회원가입</a>
    </form>
  </div>
</body>
</html>