<?php

include "../core/DB.php";

use src\core\DB;

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET") {
	session_start();

	// 친구 요청 페이지에서 넘어오는 get메소드
	if(isset($_SESSION["email"])) {
		$email = $_SESSION["email"];

		// 현재 로그인중인 이메일로 들어온 친구추가 요청을 검색
		$friend_result = DB::fetchAll("select Requester, Request_Date from friend_apply where Responser='$email';", []);

		// get요청에 쏴줌
		print_r(json_encode($friend_result));

		// 비동기 통신이 아닌 일반적인 get방식으로 요청이 들어오면
		// 다른 곳을 보내고 싶었으나 방법을 모르겠음
	}else header("Location: /webskills/main.php");
}else {

	// 유저 검색 및 유저 프로필에서 넘어오는 친구 요청 post메소드
	if(isset($_POST["email"])) {
		session_start();

		$requester = $_SESSION["email"]; // 로그인중인 이메일
		$responser = $_POST["email"]; // post에서 넘어온 이메일

		$check = false;

		$result = DB::fetch("select Responser from friend_apply where Requester='$requester';", []);

		for($i = 0; $i < sizeof($result); $i++) {
			global $check;

			// 요청자와 응답자를 비교하여 이미 보낸적이 있으면
			// 반복문을 중단시킴
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