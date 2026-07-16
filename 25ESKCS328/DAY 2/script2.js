// Dark Mode

const darkBtn = document.getElementById("darkMode");

darkBtn.onclick = function(){

document.body.classList.toggle("dark");

if(document.body.classList.contains("dark")){

darkBtn.innerHTML="☀️ Light Mode";

}

else{

darkBtn.innerHTML="🌙 Dark Mode";

}

};

// Countdown

const eventDate = new Date("July 10, 2026 09:00:00").getTime();

const timer = setInterval(function(){

const now = new Date().getTime();

const distance = eventDate-now;

const days=Math.floor(distance/(1000*60*60*24));

const hours=Math.floor((distance%(1000*60*60*24))/(1000*60*60));

const minutes=Math.floor((distance%(1000*60*60))/(1000*60));

const seconds=Math.floor((distance%(1000*60))/1000);

document.getElementById("countdown").innerHTML=

days+" Days "+hours+" Hrs "+minutes+" Min "+seconds+" Sec";

if(distance<0){

clearInterval(timer);

document.getElementById("countdown").innerHTML="Event Started 🎉";

}

},1000);


// Form Validation

const form=document.getElementById("myForm");

form.addEventListener("submit",function(e){

e.preventDefault();

let name=document.getElementById("name").value.trim();

let email=document.getElementById("email").value.trim();

let phone=document.getElementById("phone").value.trim();

let college=document.getElementById("collegeid").value.trim();

let branch=document.getElementById("branch").value;

if(name==""||email==""||phone==""||college==""){

alert("Please fill all fields");

return;

}

if(phone.length!=10){

alert("Phone should be 10 digits");

return;

}

if(branch=="Select Branch"){

alert("Select Branch");

return;

}

document.getElementById("msg").innerHTML=

"🎉 Registration Successful!";

form.reset();

});