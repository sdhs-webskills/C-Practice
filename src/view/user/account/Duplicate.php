<?php

include "../core/DB.php";

use src\core\DB;

$email = $_POST["email"];

// post로 넘어온 이메일을 유저 테이블에서 검색
$result = DB::fetch("select * from person where Email='$email';", []);

if($result) {
// 유저 테이블에서 이미 존재하는 이메일이면

	echo(json_encode(array(
		"message" => "duplicate"
	)));
}else{
// 유저 테이블에서 존재하지 않는 이메일이면

	echo(json_encode(array(
		"message" => "not duplicate"
	)));
};

?>