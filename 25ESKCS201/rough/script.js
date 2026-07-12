const form = document.getElementById("registrationForm");

const message = document.getElementById("message");

form.addEventListener("submit", function(e){

e.preventDefault();

const team = document.getElementById("team").value;

const captain = document.getElementById("captain").value;

const email = document.getElementById("email").value;

const phone = document.getElementById("phone").value;

if(team=="" || captain=="" || email=="" || phone==""){

message.style.color="red";

message.innerHTML="Please fill all fields.";

return;

}

message.style.color="green";

message.innerHTML="🎉 Registration Successful!";

form.reset();

});

const topBtn=document.getElementById("topBtn");

window.onscroll=function(){

if(document.documentElement.scrollTop>300){

topBtn.style.display="block";

}else{

topBtn.style.display="none";

}

};

topBtn.onclick=function(){

window.scrollTo({

top:0,

behavior:"smooth"

});

};