<<<<<<< HEAD
const form = document.getElementById("registrationForm");

form.addEventListener("submit", function(e){

    e.preventDefault();

    let isValid = true;

    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const mobile = document.getElementById("mobile");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");

    document.querySelectorAll(".error").forEach(error=>{
        error.innerText="";
    });

    document.getElementById("successMessage").innerText="";

    if(name.value.trim()==""){
        name.nextElementSibling.innerText="Name is required";
        isValid=false;
    }

    const emailPattern=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(email.value.trim()==""){
        email.nextElementSibling.innerText="Email is required";
        isValid=false;
    }
    else if(!emailPattern.test(email.value)){
        email.nextElementSibling.innerText="Enter a valid email address";
        isValid=false;
    }

    // Mobile Validation
    const mobilePattern=/^[0-9]{10}$/;

    if(mobile.value.trim()==""){
        mobile.nextElementSibling.innerText="Mobile number is required";
        isValid=false;
    }
    else if(!mobilePattern.test(mobile.value)){
        mobile.nextElementSibling.innerText="Enter a valid 10-digit mobile number";
        isValid=false;
    }

    if(password.value==""){
        password.nextElementSibling.innerText="Password is required";
        isValid=false;
    }
    else if(password.value.length<6){
        password.nextElementSibling.innerText="Password must be at least 6 characters";
        isValid=false;
    }
    
    if(confirmPassword.value==""){
        confirmPassword.nextElementSibling.innerText="Confirm your password";
        isValid=false;
    }
    else if(password.value!==confirmPassword.value){
        confirmPassword.nextElementSibling.innerText="Passwords do not match";
        isValid=false;
    }

    if(isValid){
        document.getElementById("successMessage").innerText =
        "Registration Successful!";
        form.reset();
    }

=======
const form = document.getElementById("registrationForm");

form.addEventListener("submit", function(e){

    e.preventDefault();

    let isValid = true;

    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const mobile = document.getElementById("mobile");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");

    document.querySelectorAll(".error").forEach(error=>{
        error.innerText="";
    });

    document.getElementById("successMessage").innerText="";

    if(name.value.trim()==""){
        name.nextElementSibling.innerText="Name is required";
        isValid=false;
    }

    const emailPattern=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(email.value.trim()==""){
        email.nextElementSibling.innerText="Email is required";
        isValid=false;
    }
    else if(!emailPattern.test(email.value)){
        email.nextElementSibling.innerText="Enter a valid email address";
        isValid=false;
    }

    // Mobile Validation
    const mobilePattern=/^[0-9]{10}$/;

    if(mobile.value.trim()==""){
        mobile.nextElementSibling.innerText="Mobile number is required";
        isValid=false;
    }
    else if(!mobilePattern.test(mobile.value)){
        mobile.nextElementSibling.innerText="Enter a valid 10-digit mobile number";
        isValid=false;
    }

    if(password.value==""){
        password.nextElementSibling.innerText="Password is required";
        isValid=false;
    }
    else if(password.value.length<6){
        password.nextElementSibling.innerText="Password must be at least 6 characters";
        isValid=false;
    }
    
    if(confirmPassword.value==""){
        confirmPassword.nextElementSibling.innerText="Confirm your password";
        isValid=false;
    }
    else if(password.value!==confirmPassword.value){
        confirmPassword.nextElementSibling.innerText="Passwords do not match";
        isValid=false;
    }

    if(isValid){
        document.getElementById("successMessage").innerText =
        "Registration Successful!";
        form.reset();
    }

>>>>>>> 9c940f7eab83dfe77285822bc50a32f74164b2dd
});