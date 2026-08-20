// ---------------------------
// Dark Mode Toggle
// ---------------------------

const themeBtn = document.getElementById("themeBtn");

themeBtn.addEventListener("click", function () {

    document.body.classList.toggle("dark");

    if (document.body.classList.contains("dark")) {
        themeBtn.innerHTML = "☀️ Light Mode";
    } else {
        themeBtn.innerHTML = "🌙 Dark Mode";
    }

});


// ---------------------------
// Click Counter
// ---------------------------

let count = 0;

const clickBtn = document.getElementById("clickBtn");
const resetBtn = document.getElementById("resetBtn");
const counter = document.getElementById("count");

clickBtn.addEventListener("click", function () {

    count++;

    counter.innerHTML = count;

});

resetBtn.addEventListener("click", function () {

    count = 0;

    counter.innerHTML = count;

});


// ---------------------------
// Form Validation
// ---------------------------

const form = document.getElementById("admissionForm");

form.addEventListener("submit", function (event) {

    event.preventDefault();

    let valid = true;

    // Name

    const name = document.getElementById("name").value.trim();

    if (name === "") {

        document.getElementById("nameError").innerHTML =
            "Please enter your name.";

        valid = false;

    } else {

        document.getElementById("nameError").innerHTML = "";

    }


    // Email

    const email = document.getElementById("email").value.trim();

    if (!email.includes("@")) {

        document.getElementById("emailError").innerHTML =
            "Enter a valid email address.";

        valid = false;

    } else {

        document.getElementById("emailError").innerHTML = "";

    }


    // Success

    if (valid) {

        alert("🎉 Admission Form Submitted Successfully!");

        form.reset();

        count = 0;

        counter.innerHTML = count;

    }

});