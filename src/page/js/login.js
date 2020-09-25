window.onload = () => {
	let form = document.querySelector("form");
	form.addEventListener("submit", function(e) {
		e.prevenDefault();

		empty_check(this.children);
	});

	function empty_check(target) {
		let check = false;

		for(let i = 0; i < target.length; i++) {
			if(i == 0 || i == 2) {
				if(target[i].value == "") {
					target[i].focus();
					alert(name_switch(target[i].getAttribute("name")) + "칸이 비었습니다.");
					check = false;
					break;
				}else check = true;
			}else{
				continue;
			};
		}	
	};

	function name_switch(name) {
		switch(name) {
			case "email" : return "이메일";
			case "password" : return "비밀번호";
		};
	};
};