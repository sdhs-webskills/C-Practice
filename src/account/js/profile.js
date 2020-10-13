fetch("profile.php", {
	mode: "cors",
	method: "post",
})
.then(req => {return req.json()})
.then(res => {
	let friend_list = document.querySelector("#friend-list");
	friend_list.innerHTML = "";

	res.forEach(item => {
		friendBox(item, friend_list);
	});
})
.catch(err => console.log(err));

function friendBox(obj, list) {
	let box = document.createElement("div");
	let name = document.createElement("li");
	let email = document.createElement("li");
	let birth = document.createElement("li");
	let hr = document.createElement("hr");

	name.innerHTML = obj[4];
	email.innerHTML = obj[1];
	birth.innerHTML = obj[5];

	box.append(name, email, birth, hr);
	list.append(box);
};

fetch("../content/content_list.php", {
	mode: "cors",
	method: "get"
})
.then(req => {return req.json()})
.then(res => {
	if(res?.message) console.log(res.message);
	else {
		let content_list = document.querySelector("#content_list");
		content_list.innerHTML = "";

		res.forEach(item => {
			postBox(item, content_list);
		});
	};
})
.catch(err => console.log(err));

function postBox(obj, list) {
	let box = document.createElement("div");
	let title = document.createElement("li");
	let content = document.createElement("li");
	let img = document.createElement("img");
	let likes = document.createElement("li");
	let comments = document.createElement("li");

	box.classList.add("post-box");

	title.innerHTML = "제목 : " + obj.Title;
	content.innerHTML = "내용 : " +textCut(obj.Text);
	likes.innerHTML = "좋아요 : 0";
	comments.innerHTML = "댓글 : 0";

	box.append(title, content, likes, comments);
	list.append(box);
};
function textCut(text) {
	let result = null;

	if(text.length > 10) {
		result = text.slice(0, 9);
		result += "...";
	}else result = text;


	return result;
};