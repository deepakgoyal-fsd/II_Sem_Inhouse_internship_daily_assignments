// ===========================
// Navbar Effect
// ===========================

window.addEventListener("scroll", function () {

    const navbar = document.querySelector(".navbar");

    if (window.scrollY > 50) {

        navbar.style.background = "#111";

    }

    else {

        navbar.style.background = "rgba(0,0,0,0.7)";

    }

});

// ===========================
// Dark Mode
// ===========================

const darkBtn = document.querySelector("#darkModeBtn");

darkBtn.addEventListener("click", function(){

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){

        darkBtn.innerHTML="☀️ Light Mode";

    }

    else{

        darkBtn.innerHTML="🌙 Dark Mode";

    }

});
// ===========================
// Booking Counter
// ===========================

let bookingCount = 0;

const bookBtn = document.querySelector("#bookBtn");
const counter = document.querySelector("#bookingCount");

bookBtn.addEventListener("click", function(){

    bookingCount++;

    counter.textContent = bookingCount;

});
// ===========================
// Form Validation
// ===========================

const submitBtn = document.querySelector("#submitBtn");

submitBtn.addEventListener("click", function (e) {

    e.preventDefault();

    const name = document.querySelector("#name").value.trim();

    const email = document.querySelector("#email").value.trim();

    const nameError = document.querySelector("#nameError");

    const emailError = document.querySelector("#emailError");

    const successMsg = document.querySelector("#successMsg");

    // Clear previous messages
    nameError.textContent = "";
    emailError.textContent = "";
    successMsg.textContent = "";

    let valid = true;

    if (name === "") {

        nameError.textContent = "Please enter your name.";

        valid = false;

    }

    if (!email.includes("@")) {

        emailError.textContent = "Please enter a valid email.";

        valid = false;

    }

    if (valid) {

        successMsg.textContent =
            "✅ Thank you! Your message has been submitted.";

    }

});
// ===========================
// Travel Cost Calculator
// ===========================

const calculateBtn = document.querySelector("#calculateBtn");

calculateBtn.addEventListener("click", function () {

    const travelers =
        parseInt(document.querySelector("#travelers").value);

    const packagePrice =
        parseInt(document.querySelector("#package").value);

    const total = travelers * packagePrice;

    document.querySelector("#totalCost").textContent =
        "$" + total;

});