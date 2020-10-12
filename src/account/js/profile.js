let url = "profile.php";

fetch(url, {
	mode: "cors",
	method: "post",
})
.then(req => {return req.json()})
.then(res => {
	let list = document.querySelector("#friend-list");
	list.innerHTML = "";

	res.forEach(item => {
		friendBox(item, list);
	});
})
.catch(err => console.log(err));

function friendBox(obj, list) {
	let box = document.createElement("div");
	let name = document.createElement("li");
	let email = document.createElement("li");
	let birth = document.createElement("li");
	let hr = document.createElement("hr");

	console.log(obj);

	name.innerHTML = obj[4];
	email.innerHTML = obj[1];
	birth.innerHTML = obj[5];

	box.append(name, email, birth, hr);
	list.append(box);
};