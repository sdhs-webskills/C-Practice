<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <script src="/webskills/src/resources/js/register.js"></script>
</head>
<body>
<form method="post" action="/webskills/src/user/account/register" enctype="multipart/form-data">
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="password" name="password-check">
    <input type="text" name="name">
    <input type="text" name="birthday">
    <input type="file" name="img" accept="image/*">
    <li id="cap-cha"></li>
    <input type="text" name="cap-cha">
    <input type="submit">
</form>
</body>
</html>