console.log("TechNova Loaded Successfully");

// Welcome Button

const buttons=document.querySelectorAll(".btn");

buttons.forEach(function(btn){

btn.addEventListener("click",function(){

console.log("Button Clicked");

});

});

// Navbar Shadow

window.addEventListener("scroll",function(){

const navbar=document.querySelector(".navbar");

if(window.scrollY>50){

navbar.classList.add("shadow");

}else{

navbar.classList.remove("shadow");

}

});