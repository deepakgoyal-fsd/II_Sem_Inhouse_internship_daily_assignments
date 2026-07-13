// ==============================
// Dark Mode Toggle
// ==============================

const themeToggle = document.getElementById("themeToggle");

themeToggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");

    const icon = themeToggle.querySelector("i");

    if(document.body.classList.contains("dark-mode")){
        icon.classList.remove("bi-moon-stars-fill");
        icon.classList.add("bi-sun-fill");
    }else{
        icon.classList.remove("bi-sun-fill");
        icon.classList.add("bi-moon-stars-fill");
    }
});


// ==============================
// Add to Cart Click Counter
// ==============================

let count = 0;

const counter = document.getElementById("cartCount");

const buttons = document.querySelectorAll(".add-cart");

buttons.forEach(button => {

    button.addEventListener("click", () => {

        count++;

        counter.innerText = count;

    });

});


// ==============================
// Navbar Active Link
// ==============================

const navLinks = document.querySelectorAll(".nav-link");

navLinks.forEach(link => {

    link.addEventListener("click", function(){

        navLinks.forEach(item => item.classList.remove("active"));

        this.classList.add("active");

    });

});


// ==============================
// Product Card Hover Animation
// ==============================

const cards = document.querySelectorAll(".product-card");

cards.forEach(card => {

    card.addEventListener("mouseenter", () => {

        card.style.transform = "translateY(-10px) scale(1.02)";

    });

    card.addEventListener("mouseleave", () => {

        card.style.transform = "translateY(0) scale(1)";

    });

});


form.addEventListener("submit", function(e){

    e.preventDefault();

    alert("Thank you for contacting Petal & Pine! 🌸");

});
// ================= CLICK COUNTER =================

let clicks = 0;

const clickCounter = document.getElementById("clickCounter");
const clickBtn = document.getElementById("clickBtn");
const resetBtn = document.getElementById("resetBtn");

clickBtn.addEventListener("click", function () {

    clicks++;
    clickCounter.textContent = clicks;

});

resetBtn.addEventListener("click", function () {

    clicks = 0;
    clickCounter.textContent = clicks;

});