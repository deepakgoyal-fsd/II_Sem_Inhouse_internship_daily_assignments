// ==============================
// Typing Effect
// ==============================

const text = "HTML •CSS •Bootstrap •JavaScript";
let index = 0;

function typingEffect() {
    if (index < text.length) {
        document.getElementById("typing").innerHTML += text.charAt(index);
        index++;
        setTimeout(typingEffect, 100);
    }
}

typingEffect();

// ==============================
// Dark Mode Toggle
// ==============================

const themeBtn = document.getElementById("themeBtn");

themeBtn.addEventListener("click", function () {

    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {
        themeBtn.innerHTML = '<i class="bi bi-sun-fill"></i>';
    }
    else {
        themeBtn.innerHTML = '<i class="bi bi-moon-stars-fill"></i>';
    }

});

// ==============================
// Scroll To Top Button
// ==============================

const topBtn = document.getElementById("topBtn");

window.onscroll = function () {

    if (document.body.scrollTop > 200 ||
        document.documentElement.scrollTop > 200) {

        topBtn.style.display = "block";

    }
    else {

        topBtn.style.display = "none";

    }

};

topBtn.onclick = function () {

    window.scrollTo({

        top: 0,
        behavior: "smooth"

    });

};
// ==============================
// Click Counter Game
// ==============================

let count = 0;

const clickBtn = document.getElementById("clickBtn");
const resetBtn = document.getElementById("resetBtn");
const countDisplay = document.getElementById("count");

clickBtn.addEventListener("click", function () {

    count++;

    countDisplay.innerHTML = count;

});

resetBtn.addEventListener("click", function () {

    count = 0;

    countDisplay.innerHTML = count;

});

// ==============================
// Contact Form Validation
// ==============================

const form = document.getElementById("contactForm");

form.addEventListener("submit", function (e) {

    e.preventDefault();

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let message = document.getElementById("message").value.trim();

    if (name === "" || email === "" || message === "") {

        alert("Please fill in all the fields.");

        return;

    }

    alert("🎉 Thank You! Your message has been sent successfully.");

    form.reset();

});