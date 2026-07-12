// =============================
// Dark Mode
// =============================

const darkBtn = document.getElementById("darkBtn");

darkBtn.addEventListener("click", function () {

    document.body.classList.toggle("dark");

    if (document.body.classList.contains("dark")) {
        darkBtn.innerHTML = "☀️ Light Mode";
    } else {
        darkBtn.innerHTML = "🌙 Dark Mode";
    }

});


// =============================
// Click Counter
// =============================

let count = 0;

const clickBtn = document.getElementById("clickBtn");
const resetBtn = document.getElementById("resetBtn");
const counter = document.getElementById("count");

clickBtn.addEventListener("click", function () {

    count++;
    counter.innerHTML = count;

});


// =============================
// Reset Counter
// =============================

resetBtn.addEventListener("click", function () {

    count = 0;
    counter.innerHTML = count;

});


// =============================
// Contact Form
// =============================

const form = document.getElementById("contactForm");

form.addEventListener("submit", function (event) {

    event.preventDefault();

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let message = document.getElementById("message").value.trim();

    if (name === "" || email === "" || message === "") {

        alert("Please fill all the fields!");

        return;

    }

    // Greeting Message

    document.getElementById("greeting").innerHTML =
        "Welcome " + name + "! Thank you for contacting Code Academy.";

    // Success Alert

    alert("Form Submitted Successfully!");

    // Clear Form

    form.reset();

});