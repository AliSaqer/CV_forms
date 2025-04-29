let inputName = document.getElementById("inputName");
let btn = document.querySelector(".btn-send");
console.log(inputName.value.length);

inputName.onkeyup = function () {
    let len = inputName.value.length;
    console.log(len);

    if (len >= 4 && len <= 20) {
        inputName.classList.add("is-valid");
        inputName.classList.remove("is-invalid");
        btn.disabled = false;
    } else {
        inputName.classList.remove("is-valid");
        inputName.classList.add("is-invalid");
        btn.disabled = true;
    }
};
