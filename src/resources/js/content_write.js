window.onload = () => {
	let form = document.querySelector("form");
	let img = form.children[4];
	let img_check = null;

	form.addEventListener("submit", function(e) {
		e.preventDefault();

		let title = this.children[2];
		let content = this.children[3];

		if(img_check) {
			if(form_check(title, content) && img_check) this.submit();
		}else {
			if(form_check(title, content)) this.submit();
		};
	});
	img.addEventListener("change", function(e) {
		if(file_type_check(e.target.value) != null) {
			img_check = true;
		}else {
			e.target.value = "";
			alert("이미지 파일만 선택가능합니다");

			img_check = false;
		};
	});
	const file_type_check = img => img.match(new RegExp(/\.png|\.jpg|\.jpeg|\.git|\.bmp/));

	function form_check(title, content) {
		let title_check = ((title.value.length >= 2) && (title.value.length <= 30));
		let content_check = (content.value.length > 0);

		if(title_check && content_check) return true;
		else if(title_check && content_check == false) error(content);
		else if(title_check == false && content_check) error(title);
		else error(title, content);
	};
	function error(ele) {
		if(arguments.length > 1) {
			[...arguments].forEach(item => {
				alert(name_switch(item.name));

				return false;
			});
		}else alert(name_switch(ele.name));
		ele.focus();
	};
	function name_switch(name) {
		switch(name) {
			case "title" : return "제목은 2~30글자 입니다.";
			case "content" : return "내용칸은 공백일 수 없습니다.";
		};
	};
};