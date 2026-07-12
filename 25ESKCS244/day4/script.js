// Fade-in Animation
window.onload = function () {
    document.body.style.opacity = "1";
};

// Dark Mode Toggle
const themeBtn = document.getElementById("themeBtn");

themeBtn.addEventListener("click", function () {

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){
        themeBtn.innerHTML = "☀ Light Mode";
    }
    else{
        themeBtn.innerHTML = "🌙 Dark Mode";
    }

});

// Click Counter
let count = 0;

const countText = document.getElementById("count");

document.getElementById("clickBtn").addEventListener("click", function(){

    count++;

    countText.innerHTML = count;

});

document.getElementById("resetBtn").addEventListener("click", function(){

    count = 0;

    countText.innerHTML = count;

});

// Form Validation

document.getElementById("contactForm").addEventListener("submit", function(e){

    e.preventDefault();

    let name = document.getElementById("name").value.trim();

    let email = document.getElementById("email").value.trim();

    let message = document.getElementById("message").value.trim();

    let valid = true;

    document.getElementById("nameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("successMsg").innerHTML = "";

    // Name Validation

    if(name === ""){

        document.getElementById("nameError").innerHTML = "Please enter your name.";

        valid = false;

    }

    // Email Validation

    if(email === ""){

        document.getElementById("emailError").innerHTML = "Please enter your email.";

        valid = false;

    }

    else if(!email.includes("@")){

        document.getElementById("emailError").innerHTML = "Enter a valid email address.";

        valid = false;

    }

    // Success

    if(valid){

        document.getElementById("successMsg").innerHTML =
        "🎉 Form Submitted Successfully!";

        document.getElementById("contactForm").reset();

    }

});

// Smooth Button Animation

const buttons = document.querySelectorAll("button");

buttons.forEach(button => {

    button.addEventListener("mouseenter", function(){

        this.style.transform = "scale(1.05)";

    });

    button.addEventListener("mouseleave", function(){

        this.style.transform = "scale(1)";

    });

});