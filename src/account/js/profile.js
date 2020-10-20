const friend_loading = (function() {
	fetch("profile.php", {
		mode: "cors",
		method: "post",
	})
	.then(res => {return res.json()})
	.then(data => {
		let friend_list = document.querySelector("#friend-list");
		friend_list.innerHTML = "";

		if(data.message) console.log(data.message);
		else {
			data.forEach(item => {
				friendBox(item, friend_list);
			});
		};
	})
	.catch(err => console.log(err));
})();

function friendBox(obj, list) {
	let box = document.createElement("div");
	let name = document.createElement("li");
	let email = document.createElement("li");
	let birth = document.createElement("li");
	let btn = document.createElement("button");

	if(obj?.Name) {
		name.innerHTML = obj.Name;
		email.innerHTML = obj.Email;
		birth.innerHTML = obj.Birth;
	}else {
		name.innerHTML = obj[0].Name;
		email.innerHTML = obj[0].Email;
		birth.innerHTML = obj[0].Birth;
	};

	btn.innerHTML = "친구 끊기";

	btn.addEventListener("click", function() {
		delete_friend(this.parentNode.children[1].innerHTML);
		friend_loading();
	});

	box.append(name, email, birth, btn);
	list.append(box);
};

const content_list_loading = (function() {
	fetch("../content/content_list.php")
	.then(res => {return res.json()})
	.then(data => {
		if(data?.message) console.log(data.message);
		else {
			let content_list = document.querySelector("#post-list");
			content_list.innerHTML = "";

			data?.forEach(item => {
				postBox(item, content_list);
			});
		};
	})
	.catch(err => console.log(err));
})();

function postBox(obj, list) {
	let box = document.createElement("div");
	let title = document.createElement("li");
	let content = document.createElement("li");
	let img = document.createElement("img");
	let likes = document.createElement("li");
	let comments = document.createElement("li");

	box.classList.add("post-box");

	title.innerHTML = `제목 : <a href='/webskills/src/content/content_list.php?title=${obj.Title}'>${obj.Title}</a>`;
	content.innerHTML = "내용 : " + textCut(obj.Text);
	likes.innerHTML = "좋아요 : 0";
	comments.innerHTML = "댓글 : 0";

	box.append(title, content, likes, comments);
	list.append(box);

	return false;
};
function textCut(text) {
	let result = null;

	if(text.length > 10) {
		result = text.slice(0, 9);
		result += "...";
	}else result = text;

	return result;
};

function delete_friend(target) {
	console.log(target);
	let form = new FormData();
	form.append("email", target);
	
	fetch("/webskills/src/account/friend_delete.php", {
		method: "post",
		body: form
	})
	.then(res => {return res.json()})
	.then(data => {
		console.log(data);
	})
	.catch(err => console.log(err));
};