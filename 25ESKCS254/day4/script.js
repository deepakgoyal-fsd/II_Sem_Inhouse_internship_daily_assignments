const themeBtn = document.getElementById("themeBtn");
const clickBtn = document.getElementById("clickBtn");
const resetBtn = document.getElementById("resetBtn");
const countText = document.getElementById("count");
const form = document.getElementById("myForm");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const nameError = document.getElementById("nameError");
const emailError = document.getElementById("emailError");
const successMessage = document.getElementById("successMessage");

let count = 0;

function updateCount() {
    countText.textContent = count;
}

themeBtn.addEventListener("click", function () {
    document.body.classList.toggle("dark");

    if (document.body.classList.contains("dark")) {
        themeBtn.textContent = "Light Mode";
        themeBtn.setAttribute("aria-label", "Switch to light mode");
    } else {
        themeBtn.textContent = "Dark Mode";
        themeBtn.setAttribute("aria-label", "Switch to dark mode");
    }
});

clickBtn.addEventListener("click", function () {
    count++;
    updateCount();
});

resetBtn.addEventListener("click", function () {
    count = 0;
    updateCount();
});

nameInput.addEventListener("input", function () {
    nameError.textContent = "";
});

emailInput.addEventListener("input", function () {
    emailError.textContent = "";
});

form.addEventListener("submit", function (event) {
    event.preventDefault();

    const name = nameInput.value.trim();
    const email = emailInput.value.trim();
    let isValid = true;

    nameError.textContent = "";
    emailError.textContent = "";
    successMessage.textContent = "";

    if (name === "") {
        nameError.textContent = "Please enter your name.";
        isValid = false;
    }

    if (email === "" || !email.includes("@")) {
        emailError.textContent = "Please enter an email address containing @.";
        isValid = false;
    }

    if (isValid) {
        successMessage.textContent = "Thanks, " + name + "! Your form was submitted successfully.";
        form.reset();
    }
});
