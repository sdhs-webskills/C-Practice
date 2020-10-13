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
	console.log(res);
})
.catch(err => console.log(err));