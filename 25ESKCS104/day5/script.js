// Registration Form

document
.getElementById("registrationForm")
.addEventListener("submit", function(e){

e.preventDefault();

alert("🎉 Registration Successful!");

this.reset();

});
// =========================
// Countdown Timer
// =========================

const eventDate = new Date("July 10, 2026 18:00:00").getTime();

const timer = setInterval(() => {

const now = new Date().getTime();

const distance = eventDate - now;

const days = Math.floor(distance/(1000*60*60*24));

const hours = Math.floor((distance%(1000*60*60*24))/(1000*60*60));

const minutes = Math.floor((distance%(1000*60*60))/(1000*60));

const seconds = Math.floor((distance%(1000*60))/1000);

document.getElementById("days").innerHTML=days;
document.getElementById("hours").innerHTML=hours;
document.getElementById("minutes").innerHTML=minutes;
document.getElementById("seconds").innerHTML=seconds;

if(distance<0){

clearInterval(timer);

document.querySelector(".countdown").innerHTML="<h2>🎉 The Festival Has Started!</h2>";

}

},1000);

// =========================
// Smooth Scroll
// =========================

document.querySelectorAll('a[href^="#"]').forEach(anchor=>{

anchor.addEventListener("click",function(e){

e.preventDefault();

document.querySelector(this.getAttribute("href")).scrollIntoView({

behavior:"smooth"

});

});

});

// =========================
// Register Buttons
// =========================

document.querySelectorAll(".event-btn,.heroBtn,.registerBtn").forEach(btn=>{

btn.addEventListener("click",()=>{

document.querySelector("#register").scrollIntoView({

behavior:"smooth"

});

});

});

// =========================
// Navbar Shadow
// =========================

window.addEventListener("scroll",()=>{

const header=document.querySelector("header");

if(window.scrollY>50){

header.style.background="#090512";

header.style.boxShadow="0 0 20px rgba(177,79,255,.35)";

}

else{

header.style.background="rgba(0,0,0,.25)";

header.style.boxShadow="none";

}

});
particlesJS("particles-js", {
  "particles": {
    "number": { "value": 80 },
    "color": { "value": "#b14fff" },
    "shape": { "type": "circle" },
    "opacity": { "value": 0.5 },
    "size": { "value": 3 },
    "line_linked": {
      "enable": true,
      "color": "#b14fff",
      "opacity": 0.3
    },
    "move": {
      "enable": true,
      "speed": 2
    }
  }
});
const cursor = document.createElement("div");
cursor.classList.add("cursor");
document.body.appendChild(cursor);

document.addEventListener("mousemove", (e) => {
  cursor.style.left = e.clientX + "px";
  cursor.style.top = e.clientY + "px";
});
const menu = document.querySelector(".menu-toggle");
const nav = document.querySelector("nav");

menu.addEventListener("click",()=>{
nav.classList.toggle("active");
});
const heroLogo = document.querySelector(".hero-logo");

document.addEventListener("mousemove",(e)=>{

const x=(e.clientX/window.innerWidth-0.5)*20;

const y=(e.clientY/window.innerHeight-0.5)*20;

heroLogo.style.transform=
`translate(${x}px,${y}px)`;

});