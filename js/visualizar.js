let oculto = false;
let input = document.querySelector("#password");

function visualizar() {
    if (oculto) {
        oculto = false;
        input.removeAttribute("type", "text");
        input.setAttribute("type", "password");

    } else {
        oculto = true;
        input.removeAttribute("type", "password");
        input.setAttribute("type", "text");
    }
}