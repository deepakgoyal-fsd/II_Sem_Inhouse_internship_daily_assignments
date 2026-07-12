/* ==========================
CURSOR LIGHT
========================== */

const light = document.querySelector(".cursor-light");

document.addEventListener("mousemove", e => {

    light.style.left = e.clientX + "px";
    light.style.top = e.clientY + "px";

});

/* ==========================
COUNTDOWN
========================== */

const eventDate = new Date("March 15, 2027 09:00:00").getTime();

setInterval(()=>{

const now = new Date().getTime();

const distance = eventDate-now;

const days=Math.floor(distance/(1000*60*60*24));

const hours=Math.floor((distance%(1000*60*60*24))/(1000*60*60));

const minutes=Math.floor((distance%(1000*60*60))/(1000*60));

const seconds=Math.floor((distance%(1000*60))/1000);

document.getElementById("days").innerHTML=days;
document.getElementById("hours").innerHTML=hours;
document.getElementById("minutes").innerHTML=minutes;
document.getElementById("seconds").innerHTML=seconds;

},1000);

/* ==========================
COUNTERS
========================== */

const counters=document.querySelectorAll(".counter");

const observer=new IntersectionObserver(entries=>{

entries.forEach(entry=>{

if(entry.isIntersecting){

const counter=entry.target;

const target=+counter.dataset.target;

let count=0;

const speed=target/120;

const update=()=>{

count+=speed;

if(count<target){

counter.innerText=Math.floor(count);

requestAnimationFrame(update);

}
else{

counter.innerText=target+"+";

}

}

update();

observer.unobserve(counter);

}

});

});

counters.forEach(counter=>observer.observe(counter));

/* ==========================
SCROLL REVEAL
========================== */

const reveals=document.querySelectorAll("section");

const revealObserver=new IntersectionObserver(entries=>{

entries.forEach(entry=>{

if(entry.isIntersecting){

entry.target.classList.add("show");

}

});

},{threshold:.15});

reveals.forEach(section=>{

section.classList.add("hidden");

revealObserver.observe(section);

});
/* ==========================
NAVBAR SCROLL EFFECT
========================== */

window.addEventListener("scroll", () => {

    const header = document.querySelector("header");

    if (window.scrollY > 50) {
        header.classList.add("scrolled");
    } else {
        header.classList.remove("scrolled");
    }

});