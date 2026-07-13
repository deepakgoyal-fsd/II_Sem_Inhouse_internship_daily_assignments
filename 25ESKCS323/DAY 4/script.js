
function changeHeading() {
    document.getElementById("heading").innerHTML =
        "Welcome to Registration Portal";
}

function toggleMode() {
    document.body.classList.toggle("dark");
}


let count = 0;

function countClick() {
    count++;
    document.getElementById("counter").innerHTML =
        "Button Clicks: " + count;
}


function validateForm() {

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("tel").value.trim();
    let password = document.getElementById("password").value.trim();

    if (name === "" || email === "" || phone === "" || password === "") {
        alert("Please fill all the fields.");
        return false;
    }

    if (phone.length != 10 || isNaN(phone)) {
        alert("Enter a valid 10-digit phone number.");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters.");
        return false;
    }

    alert("Registration Successful!");
    return true;
}