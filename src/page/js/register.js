window.onload = () => {
	let form = document.querySelector("form");
	form.addEventListener("submit", function(e) {
		e.preventDefault();

		let email = this.children[0];

		if(empty_check(this.children)) {
			if(same_check(this.children)) {
				if(birth_switch(this.children[4].value)) {
					if(form_check(this.children)) {
						this.submit();
					};
				}else alert("");

			}else alert("비밀번호가 다릅니다.");
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
	function same_check(target) {
		let check = false;

		if(target[1].value == target[2].value) check = true;
		else check = false;

		return check;
	};
	function file_type_check(img) {
		let reg = new RegExp(/\.png|\.jpg|\.jpeg|\.git|\.bmp/);
		return img.match(reg);
	};
	function form_check(target) {
		let email = target[0]; // 영어 이메일 형식
		let pw = target[1]; // 영어 대소문자, 숫자, 특수문자(0~9까지만 가능) 혼합
		let name = target[3]; // 한국어, 영어, 숫자(숫자만 제외) 2~10글자
		let birthday = target[4]; // [yyyy-mm-dd] 1920-01-01 ~ 현재

		let email_result = email.value.match(new RegExp(/\S+@\S+\.\S+/g));
		let pw_result = pw.value.match(new RegExp(/^[A-Za-z0-9!@#$%^&*()]*$/g));
		let name_result = name.value.match(new RegExp(/^[ㄱ-ㅎ|ㅏ-ㅣ|가-힣|A-Z|a-z]*$/g));
		let birth_result = birth_check(birthday.value);

		let target_arr = [email, pw, name, birthday];
		let arr = [email_result, pw_result, name_result, birth_result];

		let check = true;

		arr.forEach((item, index) => {
			if(item == undefined || item == null || item == false) {
				check = false;
				alert(name_switch(target_arr[index].getAttribute("name")) + "칸의 형식이 잘못되었습니다");
				target_arr[index].focus();
			}else{
				check = true;
			};
		});
		
		return check;
	};
	function birth_check(birth) {
		let year = birth.substr(0, 4);
		let month = birth.substr(5, 2);
		let day = birth.substr(8, 10);

		let year_check = (year > 1920);
		let month_check = (0 < month < 13);
		let day_check = (0 < day <= 31);

		if(year_check && month_check && day_check)
			return true;
		else return false;
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