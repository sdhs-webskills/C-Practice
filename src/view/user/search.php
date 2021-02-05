<?php

use src\core\DB;

$email = $_SESSION["email"];

if(isset($param)) {
    $email_result = DB::fetch("select Email from person where Email='$email';", []);
    $result = DB::fetchAll("select Email, Name, Birth, ifnull(Img, '../account/image/user/basic_img.jpg') from person where NAME='$param';", []);

    print_r($result);
};

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>search-user</title>
    <script src="/webskills/src/resources/js/search.js"></script>
</head>
<body>
<div id="wrap">
    <div id="search-box">
        <input type="text" autofocus>
        <div id="result-box">

        </div>
    </div>
    <button><a href="webskills/main">메인</a></button>
</div>
</body>
</html>
