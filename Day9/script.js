function validateForm(){

let name=document.forms["studentForm"]["name"].value;
let email=document.forms["studentForm"]["email"].value;

if(name==""){
alert("Enter Name");
return false;
}

if(email==""){
alert("Enter Email");
return false;
}

return true;

}