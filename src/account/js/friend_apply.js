let url = "friend_apply.php";

fetch(url, {
	mode: "cors",
	method: "get",
	headers: {
		"Access-Control-Allow-Origin" : "*"
	}
})
.then(req => {
	console.log(req.text())
	return req.json()})
.then(res => {
	console.log(res);
})
.catch(err => console.log(err));