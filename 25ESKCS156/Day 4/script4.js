// =======================
// Dark Mode Toggle
// =======================

let darkButton = document.getElementById("darkBtn");

darkButton.onclick = function () {

    document.body.classList.toggle("dark");

};



// =======================
// Click Counter
// =======================

let count = 0;

let clickButton = document.getElementById("clickBtn");

let resetButton = document.getElementById("resetBtn");

let counter = document.getElementById("count");

clickButton.onclick = function () {

    count++;

    counter.innerHTML = count;

};

resetButton.onclick = function () {

    count = 0;

    counter.innerHTML = count;

};



// =======================
// Greeting
// =======================

let greetButton = document.getElementById("greetBtn");

greetButton.onclick = function () {

    let username = document.getElementById("username").value;

    if (username == "") {

        document.getElementById("message").innerHTML =
            "Please enter your name.";

    }

    else {

        document.getElementById("message").innerHTML =
            "Welcome " + username + " 😊";

    }

};



// =======================
// Form Validation
// =======================

let form = document.getElementById("myForm");

form.onsubmit = function (event) {

    event.preventDefault();

    let name = document.getElementById("name").value;

    let email = document.getElementById("email").value;

    let nameError = document.getElementById("nameError");

    let emailError = document.getElementById("emailError");

    nameError.innerHTML = "";

    emailError.innerHTML = "";

    if (name == "") {

        nameError.innerHTML = "Name cannot be empty.";

        return;

    }

    if (email == "") {

        emailError.innerHTML = "Email cannot be empty.";

        return;

    }

    if (email.indexOf("@") == -1) {

        emailError.innerHTML = "Enter a valid email.";

        return;

    }

    alert("Registration Successful!");

    form.reset();

    document.getElementById("message").innerHTML = "";

};                   