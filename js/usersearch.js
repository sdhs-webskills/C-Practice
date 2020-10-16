const form = document.getElementsByTagName("form")[0];
form.addEventListener("submit", function (e) {
    e.preventDefault();

    if (e.target.search.value != "" || e.target.search.value < -1) {
        const url = `/api/search?q=${e.target.search.value}`;

        let result = document.getElementsByClassName("result");
        fetch(url)
            .then(res => res.json())
            .then(data => {
                data?.forEach(item => {
                    friend_box(item);
                })
            });

    } else alert("검색어를 입력해라");

    // const box = document.getElementById("searchbox").value;
})