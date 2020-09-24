window.onload = () => {
	let form = document.querySelector("form");
	form.addEventListener("submit", function(e) {
		e.preventDefault();

		let email = this.children[0];

		if(empty_check(this.children)) {
			if(Duplicate_check(email.value)) {
				if(same_check(this.children)) {
					if(birth_switch(this.children[4].value))
						this.submit("/webskills/register.php");

				}else alert("비밀번호가 다릅니다.");

			}else alert("이메일 형식이 잘못되었습니다.");
		};
	});

	let birthday = form.children[4];
	birthday.addEventListener("keyup", function(e) {
		this.value = birth_switch(e.target.value);
	});

	let img = form.children[5];
	img.addEventListener("change", function(e) {
		if(file_type_check(e.target.value) != null) {
			return true;
		}else {
			e.target.value = "";
			alert("이미지 파일만 선택가능합니다");
			return false;
		};
	});

	function Duplicate_check(email) {
		let reg = /\S+@\S+\.\S+/;
		return reg.test(email);
	};

	function same_check(target) {
		let check = false;

		if(target[1].value == target[2].value) check = true;
		else check = false;

		return check;
	};

	function empty_check(target) {
		let check = false;

		for(let i = 0; i < target.length; i++) {
			if(i > 4) continue;
			else {
				if(target[i].value == "") {
					target[i].focus();
					alert(name_switch(target[i].getAttribute("name")) + "칸이 비었습니다.");
					check = false;
					break;

				}else check = true;
			};
		}

		return check;
	};

	function file_type_check(img) {
		let reg = new RegExp(/\.png|\.jpg|\.jpeg|\.git|\.bmp/);
		return img.match(reg);
	};

	function birth_switch(num) {
		let number = num.replace(/[^0-9]/g, "");
		let result = "";

		if(number.length <= 4) {
			return number;
		} else if(number.length < 7) {
			result += number.substr(0, 4);
			result += "-";
			result += number.substr(4);
		} else if(number.length < 11) {
			result += number.substr(0, 4);
			result += "-";
			result += number.substr(4, 2);
			result += "-";
			result += number.substr(6);
		};

		return result;
	};
	function name_switch(name) {
		switch(name) {
			case "email" : return "이메일";
			case "password" : return "비밀번호";
			case "password-check" : return "비밀번호 재입력";
			case "name" : return "이름";
			case "birthday" : return "생년월일";
		};
	};
};