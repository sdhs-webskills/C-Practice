<?php

include "function.php";
include "../core/DB.php";

use src\core\DB;

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET") {
	session_start();

	// get요청이 왔을때 로그인 상태면 유저 검색 페이지로 이동
	if($_SESSION["email"] && $_SESSION["email"] != "") 
		header("Location: /webskills/src/account/search.html");

	else {

		// 비로그인시 로그인 페이지로 이동
		alert("로그인한 유저만 접근 가능합니다");
		echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
	};
}else {

	// post메소드에서 Email || Name으로 종류가 넘어옴
	if(isset($_POST["kind"])) {
		session_start();

		$email = $_SESSION["email"]; // 로그인중인 이메일

		$kind = $_POST["kind"];	// 검색 종류
		$value = $_POST["value"]; // 검색 값

		// 현재 로그인중인 이메일로 검색
		$email_result = DB::fetch("select Email from person where Email='$email';", []);

		// post로 넘어온 값을 검색
		$result = DB::fetchAll("select Email, Name, Birth, Img from person where $kind='$value';", []);

		if($result == false) {

			// 전체 유저에서 검색결과가 없을시
			echo(json_encode(array(
				"message" => "fail to search user"
			)));
		}else {
			$arr = [];

			if(sizeof($result) == 1) {
				// 이메일로 검색시
				if($result[0][0] == $email_result[0]) {

					//검색 결과가 본인이면
					print_r(json_encode(array(
						"message" => "can't search myself"
					)));
				}else array_push($arr, $result);
			}else {
				for($i = 0; $i < sizeof($result); $i++) {

					// 검색결과가 로그인중인 이메일과 겹칠시 continue;
					if($result[$i][0] == $email_result[0]) continue;
					else array_push($arr, $result[$i]);
				}
				print_r(json_encode($arr));
			};
		};

	// 검색 종류가 넘어오지 않을경우
	// 코드에 문제가 있을 수 있으니 main.php로 이동
	}else header("Location: /webskills/main.php");
};

?>