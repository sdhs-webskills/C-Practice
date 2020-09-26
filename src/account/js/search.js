window.onload = () => {
	let data = {};

	let search_input = document.querySelector("input[name='search-input']");
	search_input.addEventListener("keyup", function(e) {
		if(e.keyCode == 13) {
			let val = search_input.value;
			let sql = "";

			if(form_check(val) == "email") {
				sql = `select Email, Name, Birth, Img from person where Email='${val}';`;
				search(sql);
			}else if(form_check(val) == "name") {
				sql = `select Email, Name, Birth, Img from person where Name='${val}';`;
				search(sql);
			};
		};
	});

	function form_check(data) {
		let email = name = data;

		let email_result = email.match(new RegExp(/\S+@\S+\.\S+/g));
		let name_result = name.match(new RegExp(/^[ㄱ-ㅎ|ㅏ-ㅣ|가-힣|A-Z|a-z]{2,10}$/g));

		if(email_result != null && name_result == null) return "email";
		else if(name_result != null || undefined) return "name";
		else {
			alert("이메일과 이름형식으로만 검색 가능합니다");
			return "none";
		};
	};

	let result = document.querySelector("#result-box");
	function search(sql) {
		let url = "search.php";
		let form = new FormData();
		form.append("sql", sql);

		fetch(url, {
			mode: "cors",
			method: "post",
			headers: {
				"Access-Control-Allow-Origin" : "*"
			},
			body: form
		})
		.then(req => {return req.json()})
		.then(res => {
			result.innerHTML = "";
			if(res.length > 0) {
				res.forEach(item => {
					search_result(item);
				});
			}else{
				result.innerHTML = "존재하지 않는 유저입니다.";
			};
		})
		.catch(err => {
			console.log(err);
		});
	};
	function search_result(obj) {
		console.log(obj);

		let box = document.createElement("div");
		let img = document.createElement("img");
		let email = document.createElement("li");
		let name = document.createElement("li");
		let birth = document.createElement("li");

		img.setAttribute("src", obj.Img);
		email.innerHTML = obj.Email;
		name.innerHTML = obj.Name;
		birth.innerHTML = obj.Birth;

		box.append(img, email, name, birth);
		result.append(box);
	};
};