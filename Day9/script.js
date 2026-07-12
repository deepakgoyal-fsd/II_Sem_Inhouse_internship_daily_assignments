// Get Form
const form = document.getElementById("studentForm");

form.addEventListener("submit", function (event) {

    let errors = [];

    // Get Values
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const course = document.getElementById("course").value;
    const address = document.getElementById("address").value.trim();

    const gender = document.querySelector(
        'input[name="gender"]:checked'
    );

    // Name Validation
    if (name === "") {
        errors.push("Full Name is required.");
    }
    else if (!/^[A-Za-z ]+$/.test(name)) {
        errors.push("Name should contain only letters.");
    }

    // Email Validation
    const emailPattern =
        /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (email === "") {
        errors.push("Email is required.");
    }
    else if (!emailPattern.test(email)) {
        errors.push("Enter a valid email address.");
    }

    // Phone Validation
    if (phone === "") {
        errors.push("Phone Number is required.");
    }
    else if (!/^[0-9]{10}$/.test(phone)) {
        errors.push("Phone Number must be exactly 10 digits.");
    }

    // Gender Validation
    if (!gender) {
        errors.push("Please select your gender.");
    }

    // Course Validation
    if (course === "") {
        errors.push("Please select a course.");
    }

    // Address Validation
    if (address === "") {
        errors.push("Address is required.");
    }
    else if (address.length < 10) {
        errors.push("Address should be at least 10 characters.");
    }

    // Stop Form if Errors Exist
    if (errors.length > 0) {

        event.preventDefault();

        let message = "";

        for (let i = 0; i < errors.length; i++) {
            message += (i + 1) + ". " + errors[i] + "\n";
        }

        alert(message);
    }

});