(friend_loading = function() {
	return fetch("profile.php", {
		method: "post",
	})
	.then(res => {return res.json()})
	.then(data => {
		document.querySelector("#friend_count").innerHTML = "친구수 : " + data.aSize() + "명";

		let friend_list = document.querySelector("#list-box");
		if(friend_list) {
			friend_list.innerHTML = "";

			if(data.message) console.log(data.message);
			else {
				data.forEach((item, d_idx) => {
					if(d_idx > 6) return false;
					else {
						if(item.length > 0) {
							item.forEach((value, i_idx) => {
								if(i_idx < 4)
									friendBox(value, friend_list);
							});
						}else friendBox(item, friend_list);
					};
				});
			};
		};

		return data;
	})
	.catch(err => console.log(err));
})();

function friendBox(obj, list) {
	let box = document.createElement("div");
	let name = document.createElement("li");
	let email = document.createElement("li");
	let birth = document.createElement("li");
	let btn = document.createElement("button");

	box.setAttribute("class", "friend-box");

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
		modal(this.parentNode.children[1].innerHTML);
	});

	box.append(name, email, birth, btn);
	list.append(box);
};

(content_list_loading = function() {
	fetch("../content/content_list.php")
	.then(res => {return res.json()})
	.then(data => {
		document.querySelector("#post_count").innerHTML = "게시글 수 : " + data.length + "개";

		if(data?.message) console.log(data.message);
		else {
			let content_list = document.querySelector("#post-list");
			if(content_list) {
				content_list.innerHTML = "";

				data?.forEach(item => {
					postBox(item, content_list);
				});
			};
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

	box.append(title, content, img, likes, comments);
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
	let form = new FormData();
	form.append("email", target);
	
	fetch("/webskills/src/account/friend_delete.php", {
		method: "post",
		body: form
	})
	.catch(err => console.log(err));

	friend_loading();
};

Object.prototype.del = function(target) {
	[...this.children].forEach((item, index) => {
		if(item == target) {
			let id = "#" + this.children[index].getAttribute("id");
			let t = document.querySelector(id);
			document.querySelector("#" + this.getAttribute("id")).removeChild(t);
		};
	});
};
Object.prototype.forEach = function(callback) {
	for(let i = 0; i < this.length; i++) {
		callback(this[i], i);
	}
};
Array.prototype.aSize = function() {
	let size = 0;

	this.forEach(item => {
		size += item.length;
	});

	return size;
};

function modal(target) {
	let modal = document.createElement("div");
	let btn_box = document.createElement("div");
	let btn1 = document.createElement("button");
	let btn2 = document.createElement("button");
	let blind = document.createElement("div");
	let style = document.createElement("style");
	
	modal.setAttribute("id", "modal");
	btn_box.setAttribute("id", "btn-box");
	blind.setAttribute("id", "blind");

	btn1.innerHTML = "예";
	btn2.innerHTML = "아니오";

	btn1.addEventListener("click", () => {
		delete_friend(target);
	});
	btn2.addEventListener("click", function(e) {
		document.head.removeChild(style);
		document.body.removeChild(this.parentNode.parentNode);
	});

	style.append(`#modal{ width: ${window.innerWidth}px; height: ${window.innerHeight}px; position: fixed; z-index: 10; }`);
	style.append("#btn-box{ width: 300px; height: 100px; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); background: #EAEAEA; }");
	style.append("#btn-box > button{ width: calc(100%/2); height: 100%; }");
	style.append("#blind{ width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); }");
	style.setAttribute("rel", "stylesheet");

	btn_box.append(btn1, btn2);
	modal.append(btn_box, blind);

	document.head.append(style);
	document.body.append(modal);
};

window.onload = () => {
	if(more_friend_btn) {
		more_friend_btn.addEventListener("click", async function() {
			let data = await friend_loading();
			let friend_list = document.querySelector("#list-box");

			data.forEach((item, d_idx) => {
				if(item.length > 0) {
					item.forEach((value, i_idx) => {
						if(i_idx > 3)
							friendBox(value, friend_list);
					});
				}else friendBox(item, friend_list);
			});

			this.parentNode.del(this);
		});
	};
};

