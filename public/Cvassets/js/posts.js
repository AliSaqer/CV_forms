let inp = document.querySelector("#inp");
let result = document.querySelector(".search-result");

// console.log(inp.value.length);
//ajax requist
inp.onkeyup = function () {
    if (inp.value.length > 0) {
        axios
            .get("posts/search", {
                params: {
                    keyword: inp.value,
                },
            })
            .then((res) => {
                result.innerHTML = "";
                // console.log(res.data);
                res.data.forEach((ele) => {
                    let item = `<li><a href=""> ${ele.title}  </a></li>`;
                    result.innerHTML += item;
                    result.style.display = "block";
                });
            });
    } else {
        result.innerHTML = "";
        result.style.display = "none";
    }
};
