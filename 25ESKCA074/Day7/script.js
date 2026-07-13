document.getElementById("myForm").onsubmit=function(event){

let name=document.getElementById("name").value;

let email=document.getElementById("email").value;

let address=document.getElementById("address").value;

let valid=true;

document.getElementById("nameError").innerHTML="";

document.getElementById("emailError").innerHTML="";

document.getElementById("addressError").innerHTML="";

// Name should not contain numbers

let hasNumber=false;

for(let i=0;i<name.length;i++){

if(name[i]>='0' && name[i]<='9'){

hasNumber=true;

}

}

if(name==""){

document.getElementById("nameError").innerHTML="Enter name";

valid=false;

}

else if(hasNumber){

document.getElementById("nameError").innerHTML="Numbers not allowed";

valid=false;

}

// Email validation

if(email.indexOf("@")==-1){

document.getElementById("emailError").innerHTML="Invalid Email";

valid=false;

}

// Address minimum length

if(address.length<10){

document.getElementById("addressError").innerHTML="Address must be at least 10 characters";

valid=false;

}

// Gender required

let gender=document.getElementsByName("gender");

let selected=false;

for(let i=0;i<gender.length;i++){

if(gender[i].checked){

selected=true;

}

}

if(selected==false){

alert("Please select Gender");

valid=false;

}

if(valid==false){

event.preventDefault();

}

}