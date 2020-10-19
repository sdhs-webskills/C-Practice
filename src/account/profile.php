<?php

include "../core/DB.php";

use src\core\DB;

$method = $_SERVER["REQUEST_METHOD"];

session_start();

$email = $_SESSION["email"];

if($method == "GET") {
	if(isset($_GET["email"])) {
		$user = $_GET["email"];

		$info = DB::fetch("select Email, Name, Birth, Img from person where Email='$user';", []);
	}else if($email) {
		$info = DB::fetch("select Email, Name, Birth, Img from person where Email='$email';", []);
	}else header("Location: /webskills/main.php");
}else {
	if(isset($_POST["email"])) {
		$email = $_POST["email"];

		$result = DB::fetch("select Email, Name, Birth, Img from person where Email='$email';", []);
	}else if($email) {
		print_r(json_encode(getFriendArr($email)));

		return false;
	}else header("Location: /webskills/main.php");

	return false;
};

function getFriendArr($email) {
	$friend_result = DB::fetchAll("select Requester, Responser, Add_Time, Email, Name, Birth from friend inner join person on Requester='$email' and Email=Responser order by Add_Time asc;", []);

	$friend_result2 = DB::fetchAll("select Requester, Responser, Add_Time, Email, Name, Birth from friend inner join person on Responser='$email' and Email=Requester order by Add_Time asc;", []);

	if($friend_result && $friend_result2) return [$friend_result, $friend_result2];
	else if($friend_result) return $friend_result;
	else if($friend_result2) return $friend_result2;
	else return "not friend";
};

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/profile.css">
	<?php if(!isset($_GET["email"]) || isset($_GET["email"]) && $_GET["email"] == $email): ?>
	<script src="js/profile.js"></script>
<?php endif;?>
</head>
<body>
	<div id="wrap">
		<div id="profile">
			<img src="<?= $info[3] ?>" alt="" id="profile_img">
			<div id="info">
				<li id="email">이메일 : <?= $info[0] ?></li>
				<li id="name">이름 : <?= $info[1] ?></li>
				<li id="birth">생일 : <?= $info[2] ?></li>
			</div>
			<div id="info2">
				
			</div>
		</div>
		<div id="content">
			<?php if($email): ?>
				<?php if(!isset($_GET["email"]) || isset($_GET["email"]) && $_GET["email"] == $email): ?>
				<li>친구</li>
				<hr>
				<div id="friend-list">

				</div>
			<?php endif;?>
		<?php endif;?>
		<?php

		if(isset($_GET["email"]) && !$email) {

			$requester = $_SESSION["email"];
			$responser = $_GET["email"];

			$result = DB::fetch("select * from friend where Requester='$requester' and Responser='$responser';", []);

			$result2 = DB::fetch("select * from friend where Requester='$responser' and Responser='$requester';", []);

			if($result || $result2)	echo "<button>친구 끊기</button>";
			else echo "<button>친구 요청</button>";
		};

		?>
		<hr>
		<?php if(!isset($_GET["email"]) || isset($_GET["email"]) && $_GET["email"] == $email): ?>
		<li>게시글</li>
		<hr>
		<div id="post">
			<button><a href="/webskills/src/content/content_write.php">게시글 등록</a></button>
			<div id="post-list">

			</div>
		</div>
	<?php endif;?>
</div>
<button><a href="../../main.php">메인</a></button>
</div>
</body>
</html>