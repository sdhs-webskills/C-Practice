<?php

include "function.php";

session_start();

if($_SESSION["login-whether"] == true) {

}else{
	alert("로그인한 회원만 접근 가능합니다");
	
	echo "<script>document.location.href='/webskills/src/page/login.html';</script>";
};

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>search-user</title>
</head>
<body>
	<div id="wrap">
		<div id="search-box">
			<div id="input-box">
				<input type="text" name="search-input">
			</div>
			<div id="result-box">
				
			</div>
		</div>
	</div>
</body>

<?php



$html = file_get_html("../page/login.html");

?>

<!-- <script>
	console.log("asdf");
	window.onload = () => {
		console.log("asdf");
		let search = '<?php echo search(); ?>';

		console.log(search);

		let input = document.querySelector("input[name='search-input']");
		input.addEventListener("keyup", function(e) {
			console.log(input);
			if(e.keyCode == 13) {
				let $val = this.value;
				console.log($val)
				let test = "<?php echo search('$val'); ?>";
				console.log(test);
			};
		});
	};
</script> -->
</html>