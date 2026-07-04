let modeBtn=document.getElementById("modeBtn");

modeBtn.onclick=function(){

document.body.classList.toggle("dark");

if(document.body.classList.contains("dark")){

modeBtn.innerHTML=" Light Mode";

}

else{

modeBtn.innerHTML=" Dark Mode";

}

}

let count=0;

function increase(){

count++;

document.getElementById("count").innerHTML=count;

}

function resetCounter(){

count=0;

document.getElementById("count").innerHTML=count;

}

function validateForm(){

let name=document.getElementById("name").value;

let email=document.getElementById("email").value;

if(name==""){

alert("Enter Name");

return false;

}

if(email=="" || email.indexOf("@")==-1){

alert("Enter Valid Email");

return false;

}

alert("Registration Successful!");

return true;

}