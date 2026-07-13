const form=document.getElementById("registrationForm");

form.addEventListener("submit",function(event){

event.preventDefault();

let password=document.getElementById("password").value;

let confirm=document.getElementById("confirmPassword").value;

if(password!==confirm){

alert("Passwords do not match");

return;

}

alert("Registration Successful");

form.reset();

});