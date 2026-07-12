// Dark Mode Toggle

const darkBtn = document.getElementById("darkBtn");

darkBtn.addEventListener("click", function () {

    document.body.classList.toggle("dark");

    if (document.body.classList.contains("dark")) {
        darkBtn.textContent = "Light Mode";
    }
    else {
        darkBtn.textContent = "Dark Mode";
    }

});


// Click Counter

let count = 0;

const clickBtn = document.getElementById("clickBtn");
const resetBtn = document.getElementById("resetBtn");
const countText = document.getElementById("count");

clickBtn.addEventListener("click", function () {

    count++;
    countText.textContent = count;

});

resetBtn.addEventListener("click", function () {

    count = 0;
    countText.textContent = count;

});


// Form Validation

const form = document.getElementById("myForm");
const message = document.getElementById("message");

form.addEventListener("submit", function (event) {

    event.preventDefault();

    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;

    if (name.trim() === "") {

        message.textContent = "Name cannot be empty!";
        message.style.color = "red";

    }
    else if (!email.includes("@")) {

        message.textContent = "Enter a valid email!";
        message.style.color = "red";

    }
    else {

        message.textContent = "Form submitted successfully!";
        message.style.color = "green";

    }

});