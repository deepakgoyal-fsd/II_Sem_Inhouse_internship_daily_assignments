// ===============================
// Welcome Message
// ===============================

function welcome() {
    alert("Welcome to Savana! Happy Shopping 😊");
}

// ===============================
// Change Navbar on Scroll
// ===============================

window.addEventListener("scroll", function () {

    let navbar = document.querySelector(".navbar");

    if (window.scrollY > 50) {
        navbar.classList.add("shadow");
    } else {
        navbar.classList.remove("shadow");
    }

});

// ===============================
// Highlight Buy Now Button
// ===============================

let buttons = document.querySelectorAll(".btn-dark");

buttons.forEach(function(button){

    button.addEventListener("mouseover", function(){

        button.style.backgroundColor = "#ff4d6d";

    });

    button.addEventListener("mouseout", function(){

        button.style.backgroundColor = "";

    });

});