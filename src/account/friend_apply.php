<?php

include "../core/DB.php";

use src\core\DB;

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET") {
	session_start();

	// 친구 요청 페이지에서 넘어오는 get메소드
	if(isset($_SESSION["email"])) {
		$email = $_SESSION["email"];
		$friend_result = DB::fetchAll("select Requester, Request_Date from friend_apply where Responser='$email';", []);

		print_r(json_encode($friend_result));
	}else header("Location: /webskills/main.php");
}else {

	// 유저 검색 및 유저 프로필에서 넘어오는 친구 요청 post메소드
	if(isset($_POST["email"])) {
		session_start();

		$requester = $_SESSION["email"];
		$responser = $_POST["email"];

		$check = false;

		$result = DB::fetch("select Responser from friend_apply where Requester='$requester';", []);

		for($i = 0; $i < sizeof($result); $i++) {
			global $check;
			if($result[0] == $responser) {
				$check = true;
				break;
			}else continue;
		};

		// 친구 요청을 보낸적이 없으면
		if($check == false) {

			// 친구 요청 쿼리를 보냄
			$result = DB::fetch("insert into friend_apply values('$requester', '$responser', now());", []);

			// 결과를 프론트단으로 쏴줌
			echo(json_encode(array(
				"message" => $result
			)));

		}else{ // 친구 요청을 보낸적이 있으면
			echo(json_encode(array(
				"message" => "false"
			)));
		};
		
	}else header("Location: /webskills/main.php");
};

?>