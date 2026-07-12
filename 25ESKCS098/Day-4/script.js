// Dynamic Heading

const heading=document.getElementById("heading");

const headingBtn=document.getElementById("changeHeading");

headingBtn.onclick=function(){

heading.textContent="JavaScript is Working!";

};

// Click Counter

let count=0;

const counter=document.getElementById("count");

const counterBtn=document.getElementById("counterBtn");

counterBtn.onclick=function(){

count++;

counter.textContent=count;

};

// Dark Mode

const themeBtn=document.getElementById("themeBtn");

themeBtn.onclick=function(){

document.body.classList.toggle("dark");

};

// Form Validation

const form=document.getElementById("myForm");

const message=document.getElementById("message");

form.onsubmit=function(event){

event.preventDefault();

const name=document.getElementById("name").value;

const email=document.getElementById("email").value;

if(name==="" || email===""){

message.textContent="Please fill all fields.";

message.style.color="red";

}

else{

message.textContent="Registration Successful.";

message.style.color="green";

}

};