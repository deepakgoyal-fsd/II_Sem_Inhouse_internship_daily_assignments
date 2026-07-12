

let darkBtn = document.getElementById("darkBtn");

darkBtn.onclick = function () {

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){
        darkBtn.innerHTML = "Light Mode";
    }
    else{
        darkBtn.innerHTML = "Dark Mode";
    }

}




let count = 0;

let clickBtn = document.getElementById("clickBtn");

let resetBtn = document.getElementById("resetBtn");

let display = document.getElementById("count");

clickBtn.onclick = function(){

    count++;

    display.innerHTML = count;

}

resetBtn.onclick = function(){

    count = 0;

    display.innerHTML = count;

}



let form = document.getElementById("form");

form.onsubmit = function(event){

    event.preventDefault();

    let name = document.getElementById("name").value;

    let email = document.getElementById("email").value;

    let valid = true;

    if(name==""){

        document.getElementById("nameError").innerHTML = "Name is required";

        valid = false;

    }

    else{

        document.getElementById("nameError").innerHTML = "";

    }



    if(email=="" || !email.includes("@")){

        document.getElementById("emailError").innerHTML = "Enter a valid email";

        valid = false;

    }

    else{

        document.getElementById("emailError").innerHTML = "";

    }



    if(valid){

        alert("Registration Successful!");

        form.reset();

    }

}