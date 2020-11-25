window.onload = () => {
	const form_check = data => {
		let email = name = data;

		let email_result = email.match(new RegExp(/\S+@\S+\.\S+/g));
		let name_result = name.match(new RegExp(/^[ㄱ-ㅎ|ㅏ-ㅣ|가-힣|A-Z|a-z]{2,10}$/g));

		if(email_result != null && name_result == null) return "email";
		else if(name_result != null || undefined) return "name";
		else {
			alert("이메일과 이름형식으로만 검색 가능합니다");

			return false;
		};
	};
	const search = (kind, value) => {
		let url = "search.php";
		let form = new FormData();
		form.append("kind", kind);
		form.append("value", value);

		fetch(url, {
			method: "post",
			body: form
		})
			.then(res => {return res.json()})
			.then(data => {
				if(data?.message) result.innerHTML = msg_change(data.message);
				else {
					result.innerHTML = "";
					if(data.length > 0) {
						[...data].forEach(item => {
							item.forEach(value => {
								friendApply_check(value[0][0])
									.then(data => {
										search_result(value, data);
									});
							});
						});
					};
				};
			})
			.catch(err => console.log(err));
	};
	const search_result = async (arr, bool) => {
		const box = document.createElement("div");
		const a = document.createElement("a");
		const img = document.createElement("img");
		const email = document.createElement("li");
		const name = document.createElement("li");
		const birth = document.createElement("li");
		const btn = document.createElement("button");

		a.setAttribute("href", `profile.php?email=${arr[0][0]}`);
		img.setAttribute("src", arr[0][3]);
		email.innerHTML = `<a href="profile.php?email=${arr[0][0]}">${arr[0][0]}</a>`;
		name.innerHTML = `<a href="profile.php?email=${arr[0][0]}">${arr[0][1]}</a>`;
		birth.innerHTML = arr[0][2];

		if(!arr[1]) {
			if(await friend_check(arr[0][0])) btn.innerHTML = "친구끊기";
			else btn.innerHTML = "친구요청";
		};

		btn.addEventListener("click", function(e) {
			if(this.innerHTML === "친구요청")
				friend_apply(arr[0][0]);
			else if(this.innerHTML === "친구끊기")
				friend_delete(arr[0][0]);
		});

		a.append(img);
		box.append(a, email, name, birth);

		if(btn.innerHTML !== "") box.append(btn);

		result.append(box);
	};
	const friend_apply = email => {
		let url = "friend_apply.php";
		let form = new FormData();
		form.append("email", email);

		fetch(url, {
			method: "post",
			body: form
		})
			.then(res => {return res.json()})
			.then(data => data)
			.catch(err => console.log(err));
	};
	const friendApply_check = email => {
		let url = "friendApply_check.php";
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
			.then(res => {return res.json()})
			// .then(res => {return res})
			.catch(err => console.log(err));
	};
	const friend_check = email => {
		let url = "friend_check.php";
		let form = new FormData();
		form.append("email", email);

		return fetch(url, {
			method: "post",
			body: form
		})
			.then(res => {return res.json()})
			.catch(err => console.log(err));
	};
	const delete_friend = target => {
		let form = new FormData();
		form.append("email", target);

		fetch("/webskills/src/account/friend_delete.php", {
			method: "post",
			body: form
		})
			.then(res => {return res.json()})
			.then(data => {console.log(data);})
			.catch(err => console.log(err));
	};

	const msg_change = msg => {
		switch(msg) {
			case "fail to search user" : return "존재하지 않는 유저입니다.";
			case "can't search myself" : return "본인은 검색할 수 없습니다.";
			case "nothing to search" : return "친구가 아닙니다";
		};
	};

	let data = {};

	const search_input = document.querySelector("input");
	search_input.addEventListener("keyup", function(e) {
		if(e.key !== "Enter") return false;

		const val = search_input.value;

		location.href = `/webskills/src/user/search/${val}`;

		// if(form_check(val) === "email") search("Email", val);
		// else if(form_check(val) === "name") search("Name", val);
	});

	const result = document.querySelector("#result-box");
};