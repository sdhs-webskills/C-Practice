window.onload = () => {
	let form = document.querySelector("form");
	form.addEventListener("submit", function(e) {
		e.preventDefault();

		let email = this.children[0].value;

		if(empty_check(this.children)) {
			if(Duplicate_check(email)) {
				if(same_check(this.children)) {
					if(birth_check(this.children)) {
						this.submit();

					}

				}else alert("비밀번호가 다릅니다.");

			}else alert("이메일 형식이 잘못되었습니다.");
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

	function birth_check(target) {
		console.log(target);
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