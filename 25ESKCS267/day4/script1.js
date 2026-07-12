const form = document.getElementById("registrationForm");

form.addEventListener("submit", function(e){

    e.preventDefault();

    let password = document.querySelectorAll("input[type='password']")[0].value;
    let confirm = document.querySelectorAll("input[type='password']")[1].value;

    if(password !== confirm){
        alert("Password and Confirm Password do not match!");
        return;
    }

    let button = document.querySelector("button");

    button.innerHTML = "Registering...";
    button.disabled = true;

    setTimeout(function(){

        alert("🎉 Registration Successful!");

        form.reset();

        button.innerHTML = "Register Now";
        button.disabled = false;

    },2000);

});