const form = document.getElementsByTagName("form")[0];
form.addEventListener("submit", function(e) {
    e.preventDefault();

    const url = `/api/search?q=${e.target.search.value}`;
    const box = document.getElementById("searchbox").value;
    fetch(url)
    .then(res => res.json())
    .then(console.log);
})
