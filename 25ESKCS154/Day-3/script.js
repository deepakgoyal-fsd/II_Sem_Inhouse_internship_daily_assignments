// Navbar shadow on scroll

window.addEventListener("scroll", function () {

    const navbar = document.querySelector(".navbar");

    if (window.scrollY > 50) {

        navbar.style.background = "#111";

    } else {

        navbar.style.background = "rgba(0,0,0,0.7)";

    }

});