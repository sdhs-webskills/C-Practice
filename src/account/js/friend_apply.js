let url = "friend_apply.php";

fetch(url, {
	mode: "cors",
	method: "get",
	headers: {
		"Access-Control-Allow-Origin" : "*"
	}
})
.then(req => {return req.json()})
.then(res => {
	let wrap = document.querySelector("#wrap");
	wrap.innerHTML = "";
	res.forEach(item => {
		make_box(item);
	});
})
.catch(err => console.log(err));

function make_box(obj) {
	let box = document.createElement("div");
	let req = document.createElement("li");
	let date = document.createElement("li");
	let btn_box = document.createElement("div");
	let agree_btn = document.createElement("button");
	let disagree_btn = document.createElement("button");

	box.setAttribute("class", "box");
	btn_box.setAttribute("class", "btn-box");

	req.innerHTML = "보낸사람 &nbsp;: " + obj.Requester;
	date.innerHTML = "보낸 일자 : " + obj.Request_Date;
	agree_btn.innerHTML = "친구수락";
	disagree_btn.innerHTML = "거절";

	agree_btn.addEventListener("click", add_friend);

	btn_box.append(agree_btn, disagree_btn);
	box.append(req, date, btn_box);
	wrap.append(box);
};

function add_friend() {
	let req = this.parentNode.parentNode.children[0].innerHTML;
	let url = "friend_add.php";
	let form = new FormData();
	form.append("email", req.split(":")[1].trim());

	fetch(url, {
		mode: "cors",
		method: "post",
		headers: {
			"Access-Control-Allow-Origin" : "*"
		},
		body: form
	})
	.catch(err => console.log(err));
};