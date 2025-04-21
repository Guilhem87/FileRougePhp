//===================================sticky NAVBAR=============================//


//sticky navbar elle reste sur le haut de la page une fois que l'on navigue 
window.onscroll = function() {maFunction()};

const header = document.getElementById("header");
const navbar = document.getElementById("navbar");
const sticky = header.offsetHeight;

function maFunction() {
    if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
    } else {
    navbar.classList.remove("sticky");
    }
}