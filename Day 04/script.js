const submitBtn = document.getElementById("submitBtn");

submitBtn.addEventListener("click", validateForm);

function validateForm() {

    // Getting values
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const dob = document.getElementById("dob").value;
    const dept = document.getElementById("dept").value;
    const password = document.getElementById("pass").value;
    const confirmPassword = document.getElementById("cpass").value;

    const gender = document.querySelector('input[name="Gender"]:checked');

    // Name Validation
    if (name === "") {
        alert("Name is required");
        return;
    }

    if (name.length < 3) {
        alert("Name must contain at least 3 characters");
        return;
    }

    // Email Validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
        alert("Enter a valid email");
        return;
    }

    // Phone Validation
    const phonePattern = /^[6-9]\d{9}$/;

    if (!phonePattern.test(phone)) {
        alert("Enter a valid 10-digit phone number");
        return;
    }

    // Gender Validation
    if (!gender) {
        alert("Please select your gender");
        return;
    }

    // DOB Validation
    if (dob === "") {
        alert("Please select your Date of Birth");
        return;
    }

    // Department Validation
    if (dept === "") {
        alert("Please select a department");
        return;
    }

    // Password Validation
    if (password.length < 8) {
        alert("Password must be at least 8 characters long");
        return;
    }

    // Strong Password Check
    const passwordPattern =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#]).{8,}$/;

    if (!passwordPattern.test(password)) {
        alert(
            "Password must contain uppercase, lowercase, number and special character."
        );
        return;
    }

    // Confirm Password
    if (password !== confirmPassword) {
        alert("Passwords do not match");
        return;
    }

    alert("Registration Successful!");
}