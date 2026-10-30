document.querySelectorAll("nav a").forEach(link=>{

link.addEventListener("click",function(e){

e.preventDefault();

document.querySelector(this.getAttribute("href")).scrollIntoView({

behavior:"smooth"

});

});

});

const cards=document.querySelectorAll(".card");

cards.forEach(card=>{

card.addEventListener("mouseover",()=>{

card.style.boxShadow="0 10px 30px rgba(0,153,255,.4)";

});

card.addEventListener("mouseout",()=>{

card.style.boxShadow="none";

});

});

document.querySelector("form").addEventListener("submit",function(e){

e.preventDefault();

alert("Thank you! Your message has been sent.");

this.reset();

});
