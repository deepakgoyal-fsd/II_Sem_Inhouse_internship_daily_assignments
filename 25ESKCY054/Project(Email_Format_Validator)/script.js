// Elements

const emailInput = document.getElementById("email");
const validationMessage = document.getElementById("validationMessage");
const submitBtn = document.getElementById("submitBtn");
const strengthBar = document.getElementById("strengthBar");
const strengthText = document.getElementById("strengthText");
const resetBtn = document.getElementById("resetBtn");
const form = document.getElementById("emailForm");

// Regular Expression

const emailRegex =
/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;

// Email Validation

function validateEmail(email){

    return emailRegex.test(email);

}

// Email Quality Checker

function checkStrength(email){

    let score = 0;

    if(email.length >= 8)
        score++;

    if(/[A-Z]/.test(email))
        score++;

    if(/[0-9]/.test(email))
        score++;

    if(/[_%+.-]/.test(email))
        score++;

    if(email.includes("@"))
        score++;

    if(email.includes("."))
        score++;

    updateStrength(score);

}

// Update Progress Bar

function updateStrength(score){

    strengthBar.className = "progress-bar";

    if(score <= 2){

        strengthBar.style.width = "30%";
        strengthBar.classList.add("bg-danger");

        strengthText.innerHTML = "Weak";

    }

    else if(score <=4){

        strengthBar.style.width = "65%";
        strengthBar.classList.add("bg-warning");

        strengthText.innerHTML = "Good";

    }

    else{

        strengthBar.style.width = "100%";
        strengthBar.classList.add("bg-success");

        strengthText.innerHTML = "Strong";

    }

}

// Live Validation

emailInput.addEventListener("input",function(){

    const email = emailInput.value.trim();

    checkStrength(email);

    if(email === ""){

        validationMessage.innerHTML =
        "";

        emailInput.classList.remove("success");
        emailInput.classList.remove("error");

        submitBtn.disabled = true;

        strengthBar.style.width = "0%";

        strengthText.innerHTML =
        "Waiting...";

        return;

    }

    if(validateEmail(email)){

        validationMessage.innerHTML =
        "✔ Valid Email Format";

        validationMessage.className =
        "valid";

        emailInput.classList.remove("error");

        emailInput.classList.add("success");

        submitBtn.disabled = false;

    }

    else{

        validationMessage.innerHTML =
        "✖ Invalid Email Format";

        validationMessage.className =
        "invalid";

        emailInput.classList.remove("success");

        emailInput.classList.add("error");

        submitBtn.disabled = true;

    }

});

// Submit

form.addEventListener("submit",function(e){

    e.preventDefault();

    alert(
        "Congratulations!\n\nEmail format validated successfully."
    );

});

// Reset

resetBtn.addEventListener("click",function(){

    validationMessage.innerHTML = "";

    validationMessage.className = "";

    emailInput.classList.remove("success");
    emailInput.classList.remove("error");

    strengthBar.style.width = "0%";

    strengthBar.className =
    "progress-bar";

    strengthText.innerHTML =
    "Waiting...";

    submitBtn.disabled = true;

});

// Enter Key Support

emailInput.addEventListener("keypress",function(e){

    if(e.key==="Enter"){

        e.preventDefault();

        if(validateEmail(emailInput.value.trim())){

            form.requestSubmit();

        }

    }

});

// Prevent Spaces

emailInput.addEventListener("keydown",function(e){

    if(e.key===" "){

        e.preventDefault();

    }

});

// Auto Convert to Lowercase Domain

emailInput.addEventListener("blur",function(){

    let value = emailInput.value;

    if(value.includes("@")){

        let parts = value.split("@");

        let username = parts[0];

        let domain = parts[1].toLowerCase();

        emailInput.value =
        username + "@" + domain;

    }

});

// Copy Email (Double Click)

emailInput.addEventListener("dblclick",function(){

    if(emailInput.value!=""){

        navigator.clipboard.writeText(emailInput.value);

        alert("Email copied to clipboard!");

    }

});