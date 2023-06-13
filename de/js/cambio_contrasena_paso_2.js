const ojoVisible = document.getElementById("ojoVisible");
const ojo = document.getElementById("ojo");
const contrasenaInput = document.getElementById("nuevacontrasena");
const nuevacontrasena_confirm = document.getElementById("nuevacontrasena_confirm");

ojoVisible.addEventListener("click", function() {

    ojoVisible.style.visibility = "hidden";
    ojo.style.visibility = "visible";
    contrasenaInput.type = "text";
    nuevacontrasena_confirm.type = "text";

});

ojo.addEventListener("click", function() {

    ojo.style.visibility = "hidden";
    ojoVisible.style.visibility = "visible";
    contrasenaInput.type = "password";
    nuevacontrasena_confirm.type = "password";

});