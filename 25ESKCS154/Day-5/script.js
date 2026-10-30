// ===========================
// Navbar Effect
// ===========================

window.addEventListener("scroll", function () {

    const navbar = document.querySelector(".navbar");

    if (window.scrollY > 50) {

        navbar.style.background = "#111";

    }

    else {

        navbar.style.background = "rgba(0,0,0,0.7)";

    }

});

// ===========================
// Dark Mode
// ===========================

const darkBtn = document.querySelector("#darkModeBtn");

darkBtn.addEventListener("click", function(){

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){

        darkBtn.innerHTML="☀️ Light Mode";

    }

    else{

        darkBtn.innerHTML="🌙 Dark Mode";

    }

});
// ===========================
// Booking Counter
// ===========================

let bookingCount = 0;

const bookBtn = document.querySelector("#bookBtn");
const counter = document.querySelector("#bookingCount");

bookBtn.addEventListener("click", function(){

    bookingCount++;

    counter.textContent = bookingCount;

});
// ===========================
// Form Validation
// ===========================

const submitBtn = document.querySelector("#submitBtn");

submitBtn.addEventListener("click", function (e) {

    e.preventDefault();

    const name = document.querySelector("#name").value.trim();

    const email = document.querySelector("#email").value.trim();

    const nameError = document.querySelector("#nameError");

    const emailError = document.querySelector("#emailError");

    const successMsg = document.querySelector("#successMsg");

    // Clear previous messages
    nameError.textContent = "";
    emailError.textContent = "";
    successMsg.textContent = "";

    let valid = true;

    if (name === "") {

        nameError.textContent = "Please enter your name.";

        valid = false;

    }

    if (!email.includes("@")) {

        emailError.textContent = "Please enter a valid email.";

        valid = false;

    }

    if (valid) {

        successMsg.textContent =
            "✅ Thank you! Your message has been submitted.";

    }

});
// ===========================
// Travel Cost Calculator
// ===========================

const calculateBtn = document.querySelector("#calculateBtn");

calculateBtn.addEventListener("click", function () {

    const travelers =
        parseInt(document.querySelector("#travelers").value);

    const packagePrice =
        parseInt(document.querySelector("#package").value);

    const total = travelers * packagePrice;

    document.querySelector("#totalCost").textContent =
        "$" + total;

});
// ======================================================
// DAY 5
// ARRAYS + OBJECTS
// Dynamic Destinations
// ======================================================

const destinations = [

{

name:"Paris",

country:"France",

price:799,

days:"5 Days",

rating:4.8,

image:"https://images.unsplash.com/photo-1502602898657-3e91760cbb34b3fb?w=800",

description:"Visit the Eiffel Tower and enjoy romantic streets."

},

{

name:"Bali",

country:"Indonesia",

price:599,

days:"6 Days",

rating:4.9,

image:"https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=800",

description:"Relax on beautiful beaches and tropical islands."

},

{

name:"Switzerland",

country:"Switzerland",

price:999,

days:"7 Days",

rating:5.0,

image:"https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=800",

description:"Snow mountains, luxury resorts and unforgettable scenery."

},

{

name:"Dubai",

country:"UAE",

price:699,

days:"4 Days",

rating:4.7,

image:"https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=800",

description:"Experience futuristic skyscrapers and luxury shopping."

},

{

name:"Maldives",

country:"Maldives",

price:1299,

days:"5 Days",

rating:5.0,

image:"https://images.unsplash.com/photo-1573843981267-be1999ff37cd?w=800",

description:"Stay in luxurious water villas with crystal-clear beaches."

},

{

name:"Japan",

country:"Japan",

price:899,

days:"6 Days",

rating:4.9,

image:"https://images.unsplash.com/photo-1492571350019-22de08371fd3?w=800",

description:"Explore Tokyo, Kyoto and beautiful cherry blossoms."

}

];


// ======================================================
// PACKAGE OBJECTS
// ======================================================

const travelPackages = [

{

name:"Explorer",

price:299,

days:"3 Days / 2 Nights",

hotel:"Luxury Hotel",

meal:"Breakfast Included",

guide:"City Tour",

button:"btn-primary"

},

{

name:"Premium",

price:599,

days:"5 Days / 4 Nights",

hotel:"Luxury Resort",

meal:"All Meals",

guide:"Airport Pickup",

button:"btn-warning",

popular:true

},

{

name:"Luxury",

price:999,

days:"7 Days / 6 Nights",

hotel:"5-Star Resort",

meal:"All Meals",

guide:"Private Guide",

button:"btn-success"

}

];


// ======================================================
// GENERATE DESTINATION CARDS
// ======================================================

function displayDestinations(list){

let html="";

for(let i=0;i<list.length;i++){

html+=`

<div class="col-lg-4 col-md-6">

<div class="card dynamic-card shadow">

<img
src="${list[i].image}"
class="card-img-top">

<div class="card-body">

<h4 class="card-title">

${list[i].name}

</h4>

<p>

<span class="country-badge">

${list[i].country}

</span>

</p>

<p class="rating mt-2">

⭐ ${list[i].rating}

</p>

<span class="badge bg-success price-badge">

$${list[i].price}

</span>

<button
class="btn btn-primary detailsBtn mt-3">

Show Details

</button>

<div class="details">

<p>

<i class="fa-solid fa-calendar"></i>

${list[i].days}

</p>

<p>

<i class="fa-solid fa-wallet"></i>

Price : $${list[i].price}

</p>

<p>

<i class="fa-solid fa-circle-info"></i>

${list[i].description}

</p>

</div>

</div>

</div>

</div>

`;

}

document.getElementById("destinationContainer").innerHTML=html;

document.getElementById("destinationCount").textContent=list.length;

}


// ======================================================
// GENERATE PACKAGE CARDS
// ======================================================

function displayPackages(){

let html="";

let options="";

for(let i=0;i<travelPackages.length;i++){

options+=`

<option value="${travelPackages[i].price}">

${travelPackages[i].name}

</option>

`;

html+=`

<div class="col-lg-4">

<div class="card package-card text-center ${travelPackages[i].popular ? "popular" : ""}">

<div class="card-body">

<h3>

${travelPackages[i].name}

</h3>

<h2 class="package-price">

$${travelPackages[i].price}

</h2>

<p class="package-days">

${travelPackages[i].days}

</p>

<ul class="package-features">

<li>

<i class="fa-solid fa-check"></i>

${travelPackages[i].hotel}

</li>

<li>

<i class="fa-solid fa-check"></i>

${travelPackages[i].meal}

</li>

<li>

<i class="fa-solid fa-check"></i>

${travelPackages[i].guide}

</li>

</ul>

<button
class="btn ${travelPackages[i].button}">

Book Now

</button>

</div>

</div>

</div>

`;

}

document.getElementById("packageContainer").innerHTML=html;

document.getElementById("package").innerHTML=options;

}


// ======================================================
// INITIAL LOAD
// ======================================================

displayDestinations(destinations);

displayPackages();
// ======================================================
// DAY 5
// LIVE SEARCH
// ======================================================

const searchBox = document.querySelector("#searchBox");

searchBox.addEventListener("keyup", function () {

    const keyword = searchBox.value.toLowerCase();

    const filtered = destinations.filter(function (place) {

        return (
            place.name.toLowerCase().includes(keyword) ||
            place.country.toLowerCase().includes(keyword)
        );

    });

    displayDestinations(filtered);

    attachDetailsEvents();

});


// ======================================================
// PAGE LOAD ANIMATION
// ======================================================

function fadeCards(){

    $(".dynamic-card").hide();

    $(".dynamic-card").fadeIn(800);

}

fadeCards();


// ======================================================
// ATTACH EVENTS AFTER HTML IS GENERATED
// ======================================================

function attachDetailsEvents(){

    $(".detailsBtn").off("click");

    $(".detailsBtn").click(function(){

        const details =
            $(this)
            .closest(".card")
            .find(".details");

        details.stop(true,true).slideToggle(400);

        if($(this).text()=="Show Details"){

            $(this).text("Hide Details");

        }

        else{

            $(this).text("Show Details");

        }

    });

}

attachDetailsEvents();


// ======================================================
// UPDATE DESTINATION COUNT
// ======================================================

function updateCounter(list){

    document.querySelector("#destinationCount").textContent =
        list.length;

}

updateCounter(destinations);


// ======================================================
// IMPROVED DISPLAY FUNCTION
// ======================================================

const oldDisplay = displayDestinations;

displayDestinations = function(list){

    oldDisplay(list);

    updateCounter(list);

    fadeCards();

    attachDetailsEvents();

};


// ======================================================
// BOOK PACKAGE BUTTON
// ======================================================

$(document).on("click",".package-card button",function(){

    bookingCount++;

    counter.textContent = bookingCount;

    alert("Package added successfully!");

});


// ======================================================
// DESTINATION CARD HOVER
// ======================================================

$(document).on("mouseenter",".dynamic-card",function(){

    $(this)

    .css("transition",".35s")

    .css("box-shadow","0 20px 40px rgba(0,0,0,.25)");

});

$(document).on("mouseleave",".dynamic-card",function(){

    $(this)

    .css("box-shadow","0 10px 25px rgba(0,0,0,.15)");

});


// ======================================================
// SEARCH MESSAGE
// ======================================================

searchBox.addEventListener("keyup",function(){

    if(searchBox.value==""){

        displayDestinations(destinations);

        return;

    }

    const value = searchBox.value.toLowerCase();

    const result = destinations.filter(function(place){

        return place.name.toLowerCase().includes(value)

        ||

        place.country.toLowerCase().includes(value);

    });

    displayDestinations(result);

});


// ======================================================
// ENTER KEY SEARCH
// ======================================================

searchBox.addEventListener("keypress",function(e){

    if(e.key==="Enter"){

        e.preventDefault();

    }

});


// ======================================================
// AUTO LOAD
// ======================================================

displayDestinations(destinations);

displayPackages();

attachDetailsEvents();

fadeCards();
// ======================================================
// DAY 5
// jQUERY EFFECTS
// ======================================================

$(document).ready(function () {

    // Hide all details initially
    $(".details").hide();

    // Page animation
    $(".dynamic-card").hide().fadeIn(1000);

    // ==================================================
    // SHOW / HIDE DETAILS
    // ==================================================

    $(document).on("click", ".detailsBtn", function () {

        const details = $(this)
            .closest(".dynamic-card")
            .find(".details");

        details.stop(true, true).slideToggle(400);

        // Change Button Text

        if ($(this).text() === "Show Details") {

            $(this).text("Hide Details");

            $(this)
                .removeClass("btn-primary")
                .addClass("btn-danger");

        }

        else {

            $(this).text("Show Details");

            $(this)
                .removeClass("btn-danger")
                .addClass("btn-primary");

        }

    });

});


// ======================================================
// HOVER EFFECT
// ======================================================

$(document).on("mouseenter", ".dynamic-card", function () {

    $(this).find(".price-badge").stop().animate({

        opacity:0.9

    },200);

});

$(document).on("mouseleave", ".dynamic-card", function () {

    $(this).find(".price-badge").stop().animate({

        opacity:1

    },200);

});


// ======================================================
// PACKAGE BUTTON EFFECT
// ======================================================

$(document).on("click",".package-card button",function(){

    $(this)

    .text("Booked ✓")

    .removeClass("btn-primary btn-warning btn-success")

    .addClass("btn-dark");

});


// ======================================================
// CONTACT FORM SUCCESS EFFECT
// ======================================================

$("#submitBtn").click(function(){

    $("#successMsg")

    .hide()

    .fadeIn(600);

});


// ======================================================
// SEARCH BAR EFFECT
// ======================================================

$("#searchBox").focus(function(){

    $(this).css({

        "border":"2px solid #198754",

        "box-shadow":"0 0 12px rgba(25,135,84,.3)"

    });

});

$("#searchBox").blur(function(){

    $(this).css({

        "border":"2px solid #0d6efd",

        "box-shadow":"none"

    });

});


// ======================================================
// SMOOTH SCROLL
// ======================================================

$("a.nav-link").click(function(e){

    e.preventDefault();

    let target=$(this).attr("href");

    $("html,body").animate({

        scrollTop:$(target).offset().top-70

    },700);

});


// ======================================================
// CONSOLE OUTPUT
// (Assignment Demonstration)
// ======================================================

console.log("========== ARRAY ==========");

console.log(destinations);

console.log("First Destination :",destinations[0].name);

console.log("Last Destination :",destinations[destinations.length-1].name);

console.log("Total Destinations :",destinations.length);


console.log("========== OBJECT ==========");

console.log(travelPackages[0]);

console.log(`${travelPackages[0].name} costs $${travelPackages[0].price}`);


console.log("========== LOOP ==========");

for(let i=0;i<destinations.length;i++){

    console.log(

        `${i+1}. ${destinations[i].name}`

    );

}


// ======================================================
// PAGE LOADED
// ======================================================

console.log("Day 5 Project Loaded Successfully.");