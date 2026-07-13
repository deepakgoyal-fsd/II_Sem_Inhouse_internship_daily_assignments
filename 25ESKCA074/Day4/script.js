// ===========================
// Dark Mode Toggle
// ===========================

let darkBtn = document.getElementById("darkBtn");

darkBtn.onclick = function(){

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){
        darkBtn.innerHTML = "Light Mode";
    }
    else{
        darkBtn.innerHTML = "Dark Mode";
    }

};


// ===========================
// Click Counter
// ===========================

let count = 0;

let clickBtn = document.getElementById("clickBtn");
let resetBtn = document.getElementById("resetBtn");
let counter = document.getElementById("count");

clickBtn.onclick = function(){

    count++;

    counter.innerHTML = count;

};

resetBtn.onclick = function(){

    count = 0;

    counter.innerHTML = count;

};


// ===========================
// Form Validation
// ===========================

let form = document.getElementById("myForm");

form.onsubmit = function(event){

    let name = document.getElementById("txtName").value;
    let email = document.getElementById("mail").value;

    let valid = true;

    document.getElementById("nameError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";

    if(name == ""){

        document.getElementById("nameError").innerHTML = "Name cannot be empty";

        valid = false;

    }

    if(email.indexOf("@") == -1){

        document.getElementById("emailError").innerHTML = "Enter a valid email";

        valid = false;

    }

    if(valid == false){

        event.preventDefault();

    }

};