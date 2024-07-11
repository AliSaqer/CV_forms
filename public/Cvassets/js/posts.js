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

    $("#edit-form .alert").addClass("d-none");
    $("#edit-form .alert").html("");

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
                $("#row_" + res.id + " td:nth-child(3)").text(res.title);
                $("#row_" + res.id + " td:nth-child(5) img").attr(
                    "src",
                    "/uploads/" + res.image
                );

                //success massage
                Swal.fire({
                    title: "UPDATED SUCCESSFULY",
                    text: "GOOD JOB",
                    icon: "success",
                });
                $("#editmodal").modal("hide");
            },

            error: function (err) {
                $("#edit-form .alert").removeClass("d-none");
                $("#edit-form .alert").html("");

                let errorArr = err.responseJSON.errors;
                for (const key in errorArr) {
                    // console.log(`${key} : ${errorArr[key]}`);
                    let li = "<li>" + errorArr[key] + "</li>";
                    $("#edit-form .alert").append(li);
                }
            },
        });
    });
});

//delete ajax

$(".delete-form").on("submit", function (e) {
    e.preventDefault();
    let url = $(this).attr("action");
    // let data = new FormData(this);
    //يستخدم لمن ما يكون فيه في الداتا فايلات  وبس تكون الحقول عبارة عن نصوص serialize();
    let data = $(this).serialize();

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: url,
                data: data,
                success: function (res) {
                    console.log(res);
                    $("#row_" + res.id).remove();
                },
            });

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
            });
            Toast.fire({
                icon: "success",
                title: "fucked up real good!!",
            });
        }
    });
});
