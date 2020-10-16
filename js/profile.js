function friend_box(obj) {
    let id = document.createElement("div");
    
    id.innerHTML = obj.id;

    document.querySelector(".result").appendChild(id);

    
};