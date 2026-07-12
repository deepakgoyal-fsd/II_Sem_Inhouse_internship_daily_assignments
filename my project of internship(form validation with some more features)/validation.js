// ================================
// Get Elements
// ================================

const form = document.querySelector("form");

const fullName = document.getElementById("full_name");
const email = document.getElementById("email");
const mobile = document.getElementById("mobile");
const dob = document.getElementById("dob");
const age = document.getElementById("age");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirm_password");

// ================================
// Future DOB Block
// ================================

dob.max = new Date().toISOString().split("T")[0];

// ================================
// Age Calculation
// ================================

dob.addEventListener("change", function () {

    let birthDate = new Date(this.value);
    let today = new Date();

    let userAge = today.getFullYear() - birthDate.getFullYear();

    let month = today.getMonth() - birthDate.getMonth();

    if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
        userAge--;
    }

    age.value = userAge;

});

// ================================
// Name Validation
// ================================

fullName.addEventListener("input", function () {

    let pattern = /^[A-Za-z ]+$/;

    if (pattern.test(this.value)) {
        this.style.border = "2px solid green";
    } else {
        this.style.border = "2px solid red";
    }

});

// ================================
// Email Validation
// ================================

email.addEventListener("input", function () {

    let pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (pattern.test(this.value)) {
        this.style.border = "2px solid green";
    } else {
        this.style.border = "2px solid red";
    }

});

// ================================
// Mobile Validation
// ================================

mobile.addEventListener("input", function () {

    this.value = this.value.replace(/\D/g, "");

    let pattern = /^[0-9]{10}$/;

    if (pattern.test(this.value)) {
        this.style.border = "2px solid green";
    } else {
        this.style.border = "2px solid red";
    }

});

// ================================
// Password Match
// ================================

confirmPassword.addEventListener("input", function () {

    if (password.value === confirmPassword.value) {

        password.style.border = "2px solid green";
        confirmPassword.style.border = "2px solid green";

    } else {

        password.style.border = "2px solid red";
        confirmPassword.style.border = "2px solid red";

    }

});

// ================================
// Form Submit Validation
// ================================

form.addEventListener("submit", function (e) {

    if (fullName.value.trim() === "") {
        alert("Please enter your Full Name");
        fullName.focus();
        e.preventDefault();
        return;
    }

    if (!/^[A-Za-z ]+$/.test(fullName.value)) {
        alert("Full Name should contain only letters");
        fullName.focus();
        e.preventDefault();
        return;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        alert("Enter a valid Email Address");
        email.focus();
        e.preventDefault();
        return;
    }

    if (!/^[0-9]{10}$/.test(mobile.value)) {
        alert("Enter a valid 10-digit Mobile Number");
        mobile.focus();
        e.preventDefault();
        return;
    }

    if (dob.value === "") {
        alert("Please select your Date of Birth");
        dob.focus();
        e.preventDefault();
        return;
    }

    if (password.value.length < 8) {
        alert("Password must be at least 8 characters");
        password.focus();
        e.preventDefault();
        return;
    }

    if (password.value !== confirmPassword.value) {
        alert("Passwords do not match");
        confirmPassword.focus();
        e.preventDefault();
        return;
    }

});