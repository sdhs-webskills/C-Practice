<?php

include "../account/function.php";
include "../core/DB.php";

use src\core\DB;

$method = $_SERVER["REQUEST_METHOD"];

session_start();

$email = $_SESSION["email"];


if($method == "GET") {
	extract($_GET);
	print_r($test);
	// if(!$email) {
	// 	alert("로그인한 유저만 접근 가능합니다");
	// 	echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
	// };
}else{
	extract($_POST);
	if(isset($_POST["content"])) {
		$add_writer = DB::fetch("insert into writer values('$email', '$title');", []);
		$add_text = DB::fetch("insert into content values('$email', '$title', '$text', now());", []);
	};
};

?>