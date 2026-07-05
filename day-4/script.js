// Dark Mode

let darkBtn = document.getElementById("darkBtn");

darkBtn.onclick = function(){

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){
        darkBtn.innerHTML="☀ Light Mode";
    }
    else{
        darkBtn.innerHTML="🌙 Dark Mode";
    }

};

// Counter

let count = 0;

let display = document.getElementById("count");

document.getElementById("increase").onclick=function(){

    count++;

    display.innerHTML=count;

};

document.getElementById("reset").onclick=function(){

    count=0;

    display.innerHTML=count;

};

// Form Validation

document.getElementById("myForm").onsubmit=function(event){

event.preventDefault();

let name=document.getElementById("name").value;

let email=document.getElementById("email").value;

document.getElementById("nameError").innerHTML="";
document.getElementById("emailError").innerHTML="";

let valid=true;

if(name==""){
    document.getElementById("nameError").innerHTML="Name is required";
    valid=false;
}

if(!email.includes("@")){
    document.getElementById("emailError").innerHTML="Enter a valid email";
    valid=false;
}

if(valid){
    alert("Form Submitted Successfully");
}

};