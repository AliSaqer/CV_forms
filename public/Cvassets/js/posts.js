//ajax requist for search using xious lip.
let inp = document.querySelector("#inp");
let result = document.querySelector(".search-result");

inp.onblur = () => {
    result.style.display = "none";
};

inp.onfocus = () => {
    if (inp.value.length > 0) {
        result.style.display = "block";
    }
};

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
                    let item = `<li><a href=""> ${ele.title} - views ${ele.views} </a></li>`;
                    result.innerHTML += item;
                    result.style.display = "block";
                });
            });
    } else {
        result.innerHTML = "";
        result.style.display = "none";
    }
};

//end of search ajax

//notification thate the post creation was success

setTimeout(() => {
    document.querySelector(".alert-success").style.display = "none";
}, 3000);

//end

// setInterval(() => {
//     console.log("interval");
// }, 1000);

//ajax for edit using jquery
$(".btn-edit").on("click", function () {
    let url = $(this).data("url");
    let title = $(this).data("title");
    let email = $(this).data("email");
    let image = $(this).data("image");
    let body = $(this).data("body");

    $("#edit-form").attr("action", url);
    $("#editmodal input[name=title]").val(title);
    $("#editmodal input[name=email]").val(email);
    $(".img-space").attr("src", image);
    tinymce.activeEditor.setContent(body);

    //sending data using ajax
    $("#edit-form").on("submit", function (e) {
        e.preventDefault();

        let data = new FormData(this);

        //ajax requist
        $.ajax({
            type: "post",
            url: $("#edit-form").attr("action"),
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                console.log(res);
                Swal.fire({
                    title: "UPDATED SUCCESSFULY",
                    text: "GOOD JOB",
                    icon: "success",
                });
            },
        });
    });
});
