<?php

include "../core/DB.php";

use src\core\DB;

$method = $_SERVER["REQUEST_METHOD"];

session_start();

$email = $_SESSION["email"];

if($method == "GET") {
	if(isset($_GET["email"]) && $_GET["email"] != $email) {
		$user = $_GET["email"];

		$info = DB::fetch("select Email, Name, Birth, ifnull(Img, '../account/image/user/basic_img.jpg') from person where Email='$user';", []);
	}else if($email) {
		$info = DB::fetch("select Email, Name, Birth, ifnull(Img, '../account/image/user/basic_img.jpg') from person where Email='$email';", []);
	}else header("Location: /webskills/main.php");
}else {
	if(isset($_POST["email"])) {
		$email = $_POST["email"];

		$result = DB::fetch("select Email, Name, Birth, ifnull(Img, '../account/image/user/basic_img.jpg') from person where Email='$email';", []);
	}else if($email) {
		print_r(json_encode(getFriendArr($email)));

		return false;
	}else header("Location: /webskills/main.php");

	return false;
};

function getFriendArr($email) {
	$friend_result = DB::fetchAll("select Requester, Responser, Add_Time, Email, Name, Birth from friend inner join person on Email=Responser and Requester='$email';", []);

	$friend_result2 = DB::fetchAll("select Requester, Responser, Add_Time, Email, Name, Birth from friend inner join person on Email=Requester and Responser='$email';", []);

	if($friend_result && $friend_result2) return [$friend_result, $friend_result2];
	else if($friend_result) return $friend_result;
	else if($friend_result2) return $friend_result2;
	else return array("message" => "don't have friend");
};

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../../resources/css/profile.css">
	<?php if(!isset($_GET["email"]) || isset($_GET["email"]) && $_GET["email"] == $email): ?>
	<script src="../../../resources/js/profile.js"></script>
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
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<div id="info2">
				<li id="friend_count">친구 수 : </li>
				<li id="post_count">게시글 수 : </li>
			</div>
		</div>
		<?php if(!isset($_GET["email"]) || isset($_GET["email"]) && $_GET["email"] == $email): ?>
		<div id="content">
			<li>친구</li>
			<hr>
			<div id="friend-list">
				<div id="list-box">

				</div>
				<?php

				if($email || isset($_GET["email"]) && $_GET["email"] == $email) {
					$left_size = count(getFriendArr($email)[0]);
					$right_size = count(getFriendArr($email)[1]);
					$a_size = $left_size + $right_size;

					if($a_size > 6) {
						echo "<button id='more-friend'>더보기</button>";

						echo "<script>let more_friend_btn = document.querySelector('#more-friend');</script>";
					}else echo "<script>let more_friend_btn = null;</script>";
				};

				?>
			</div>
			<hr>
			<div id="post">
				<li>게시글</li>
				<div id="post-list">

				</div>
				<button><a href="/webskills/src/content/content_write.php">게시글 등록</a></button>
			</div>
		</div>
	<?php endif;?>
	<button><a href="../../../../main.php">메인</a></button>
	<?php

	if(isset($_GET["email"]) && $email) {

		$requester = $_SESSION["email"];
		$responser = $_GET["email"];

		$result = DB::fetch("select * from friend where Requester='$requester' and Responser='$responser';", []);

		$result2 = DB::fetch("select * from friend where Requester='$responser' and Responser='$requester';", []);

		if($result || $result2)	echo "<button>친구 끊기</button>";
		else echo "<button>친구 요청</button>";
	};

	?>
</div>
</body>
</html>
