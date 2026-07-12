let click = 0;


function darkMode(){

document.body.classList.toggle("dark");

let btn=document.getElementById("themeBtn");

if(document.body.classList.contains("dark"))
{
btn.innerHTML="☀ Light Mode";
}
else
{
btn.innerHTML="🌙 Dark Mode";
}

}

document.getElementById("registerForm").addEventListener("click",function(e){
    

e.preventDefault();


click++;

document.getElementById("clickCount").innerHTML =
"Total Clicks : " + click;

document.querySelectorAll(".error").forEach(function(item){
item.innerHTML="";
});

// Reset Button
document.getElementById("resetBtn").addEventListener("click", function(){
    

    click= 0;

    document.getElementById("clickCount").innerHTML =
    "Total Clicks : 0";

    // सभी Error Messages भी हट जाएंगी
  

});

let valid=true;

let name=document.getElementById("name").value.trim();
let email=document.getElementById("email").value.trim();
let phone=document.getElementById("phone").value.trim();
let dob=document.getElementById("dob").value;
let documents=document.getElementById("documents").value.trim();
let password=document.getElementById("password").value;
let confirm=document.getElementById("confirmPassword").value;

if(name==""){
document.getElementById("nameError").innerHTML="Name is required";
valid=false;
}

let emailPattern=/^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

if(email==""){
document.getElementById("emailError").innerHTML="Email is required";
valid=false;
}
else if(!email.match(emailPattern)){
document.getElementById("emailError").innerHTML="Invalid Email";
valid=false;
}

if(phone==""){
document.getElementById("phoneError").innerHTML="Phone is required";
valid=false;
}
else if(phone.length!=10 || isNaN(phone)){
document.getElementById("phoneError").innerHTML="Enter 10 digit phone";
valid=false;
}

if(dob==""){
document.getElementById("dobError").innerHTML="Select DOB";
valid=false;
}

if(documents==""){
document.getElementById("docError").innerHTML="Enter document";
valid=false;
}

if(password==""){
document.getElementById("passwordError").innerHTML="Password required";
valid=false;
}
else if(password.length<6){
document.getElementById("passwordError").innerHTML="Minimum 6 characters";
valid=false;
}

if(confirm==""){
document.getElementById("confirmError").innerHTML="Confirm Password";
valid=false;
}
else if(password!=confirm){
document.getElementById("confirmError").innerHTML="Password not matched";
valid=false;
}

if(valid){
alert("Registration Successful");
document.getElementById("registerForm").reset();
}

});