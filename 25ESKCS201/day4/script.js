// Dark Mode
const themeBtn = document.getElementById("themeBtn");

themeBtn.addEventListener("", function(){

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){
        themeBtn.innerHTML="☀️ Light Mode";
    }
    else{
        themeBtn.innerHTML="🌙 Dark Mode";
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
document.getElementById("myForm").addEventListener("submit", function(e){

    e.preventDefault();

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();

    let valid = true;

    document.getElementById("nameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";

    if(name === ""){
        document.getElementById("nameError").innerHTML = "Name is required";
        valid = false;
    }

    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if(!pattern.test(email)){
        document.getElementById("emailError").innerHTML = "Enter a valid email";
        valid = false;
    }

    if(valid){
        alert("Form Submitted Successfully!");
        document.getElementById("myForm").reset();
    }

});