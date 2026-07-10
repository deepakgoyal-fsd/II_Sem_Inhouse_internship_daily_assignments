let darkModeBtn = document.getElementById("darkModeBtn");
let pageBody = document.body;

darkModeBtn.addEventListener("click", function() {
    pageBody.classList.toggle("dark");
    
    if (pageBody.classList.contains("dark")) {
        darkModeBtn.innerText = "Disable Dark Mode";
    } else {
        darkModeBtn.innerText = "Enable Dark Mode";
    }
});


let count = 0;
let countDisplay = document.getElementById("countDisplay");
let counterBtn = document.getElementById("counterBtn");
let resetBtn = document.getElementById("resetBtn");

counterBtn.addEventListener("click", function() {
    count = count + 1;
    countDisplay.innerText = count;
});

resetBtn.addEventListener("click", function() {
    count = 0;
    countDisplay.innerText = count;
});


let myForm = document.getElementById("myForm");
let nameInput = document.getElementById("nameInput");
let emailInput = document.getElementById("emailInput");
let nameError = document.getElementById("nameError");
let emailError = document.getElementById("emailError");

myForm.addEventListener("submit", function(event) {
    event.preventDefault();

    nameError.innerText = "";
    emailError.innerText = "";
    let isFormValid = true;

    if (nameInput.value === "") {
        nameError.innerText = "Name cannot be empty.";
        isFormValid = false;
    }

    if (emailInput.value.includes("@") === false) {
        emailError.innerText = "Email must contain an @ symbol.";
        isFormValid = false;
    }

    if (isFormValid === true) {
        alert("Success! Form is valid.");
    }
});