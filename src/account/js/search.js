window.onload = () => {
	let data = {};

	let search_input = document.querySelector("input[name='search-input']");
	search_input.addEventListener("keyup", function(e) {
		if(e.keyCode == 13) {
			let val = search_input.value;
			let sql = "";

			if(form_check(val) == "email") {
				search("Email", val);
			}else if(form_check(val) == "name") {
				search("Name", val);
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
	function search(kind, value) {
		let url = "search.php";
		let form = new FormData();
		form.append("kind", kind);
		form.append("value", value);

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
			if(res?.message) result.innerHTML = msg_change(res.message);
			else {
				result.innerHTML = "";
				if([...res].length > 0) {
					[...res].forEach(item => {
						friend_check(item[0])
						.then(res => {
							if(res == false) search_result(item);
						});
					});
				};
			};
		})
		.catch(err => {
			console.log(err);
		});
	};
	function search_result(arr) {
		let box = document.createElement("div");
		let img = document.createElement("img");
		let email = document.createElement("li");
		let name = document.createElement("li");
		let birth = document.createElement("li");
		let btn = document.createElement("button");

		img.setAttribute("src", arr[3]);
		email.innerHTML = arr[0];
		name.innerHTML = arr[1];
		birth.innerHTML = arr[2];

		if(friend_check(arr[0]) == true) btn.innerHTML = "친구끊기";
		else btn.innerHTML = "친구요청";

		btn.addEventListener("click", function(e) {
			if(this.innerHTML == "친구요청")
				friend_apply(this.parentNode.children[1].innerHTML);
		});

		box.append(img, email, name, birth, btn);
		result.append(box);
	};
	function friend_apply(email) {
		let url = "friend_apply.php";
		let form = new FormData();
		form.append("email", email);

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
			console.log(res);
		})
		.catch(err => console.log(err));
	};
	function friend_check(email) {
		let url = "friend_check.php";
		let form = new FormData();
		form.append("email", email);

		return fetch(url, {
			mode: "cors",
			method: "post",
			headers: {
				"Access-Control-Allow-Origin" : "*"
			},
			body: form
		})
		.then(req => {return req.json()})
		.then(res => {return res})
		.catch(err => console.log(err));
	};

	function msg_change(msg) {
		switch(msg) {
			case "fail to search user" : return "존재하지 않는 유저입니다.";
			case "can't search myself" : return "본인은 검색할 수 없습니다.";
		}
	}
};