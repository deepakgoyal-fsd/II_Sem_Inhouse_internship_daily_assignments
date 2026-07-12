const form = document.getElementById("studentForm");
const errorBox = document.getElementById("errorBox");
const photoInput = document.getElementById("photo");
const preview = document.getElementById("preview");

// Photo Preview
photoInput.addEventListener("change", function () {

    const file = this.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
    }

});

// Form Validation
form.addEventListener("submit", function (e) {

    let errors = [];

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
        errors.push("Name is required.");
    } else if (!/^[A-Za-z ]+$/.test(name)) {
        errors.push("Name must contain only letters.");
    }

    // Email Validation
    if (email === "") {
        errors.push("Email is required.");
    } else if (
        !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    ) {
        errors.push("Enter a valid email address.");
    }

    // Phone Validation
    if (phone === "") {
        errors.push("Phone number is required.");
    } else if (!/^[0-9]{10}$/.test(phone)) {
        errors.push("Phone number must be exactly 10 digits.");
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
    } else if (address.length < 10) {
        errors.push("Address must contain at least 10 characters.");
    }

    // Display Errors
    if (errors.length > 0) {

        e.preventDefault();

        errorBox.classList.remove("d-none");
        errorBox.style.display = "block";

        errorBox.innerHTML = `
            <strong>Please fix the following errors:</strong>
            <ul>
                ${errors.map(error => `<li>${error}</li>`).join("")}
            </ul>
        `;

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

    } else {

        errorBox.classList.add("d-none");
        errorBox.style.display = "none";

    }

});