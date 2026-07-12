const houseContainer = document.getElementById("houseContainer");
const loader = document.getElementById("loader");
const searchInput = document.getElementById("searchInput");
const priceFilter = document.getElementById("priceFilter");
const topBtn = document.getElementById("topBtn");

let houses = [];

// Load Houses
async function loadHouses() {

    loader.style.display = "block";

    try {

        const response = await fetch("houses.json");

        houses = await response.json();

        displayHouses(houses);

        loader.style.display = "none";

    }

    catch(error){

        loader.innerHTML = `
        <h2 class="text-danger">
        Failed to Load Houses
        </h2>
        `;

        console.log(error);

    }

}

// Display Houses

function displayHouses(data){

    houseContainer.innerHTML="";

    if(data.length===0){

        houseContainer.innerHTML=`

<div class="col-12 text-center">

<h2>No Houses Found</h2>

</div>

`;

return;

    }

    data.forEach(house=>{

houseContainer.innerHTML+=`

<div class="col-lg-4 col-md-6">

<div class="house-card">

<div class="favorite">🤍</div>

<img src="${house.image}">

<div class="card-body">

<h4>${house.name}</h4>

<p class="city">

📍 ${house.city}

</p>

<h3 class="price">

₹${house.price.toLocaleString()}/month

</h3>

<div class="features">

<span>🛏 ${house.bedrooms} Beds</span>

<span>🚿 ${house.bathrooms} Bath</span>

</div>

<p>

⭐ ${house.rating}

</p>

<button class="btn-rent">

Book Visit

</button>

</div>

</div>

</div>

`;

    });

    // Favourite

document.querySelectorAll(".favorite").forEach(btn=>{

btn.onclick=function(){

this.innerHTML=this.innerHTML==="🤍"?"❤️":"🤍";

}

});

}

// Filter

function filterHouses(){

const search=searchInput.value.toLowerCase();

const price=priceFilter.value;

let filtered=houses.filter(house=>{

const cityMatch=house.city.toLowerCase().includes(search);

let priceMatch=true;

if(price!="all"){

priceMatch=house.price<=parseInt(price);

}

return cityMatch && priceMatch;

});

displayHouses(filtered);

}

// Live Search

searchInput.addEventListener("keyup",filterHouses);

priceFilter.addEventListener("change",filterHouses);

// Scroll Button

window.onscroll=function(){

if(document.documentElement.scrollTop>250){

topBtn.style.display="block";

}

else{

topBtn.style.display="none";

}

}

topBtn.onclick=function(){

window.scrollTo({

top:0,

behavior:"smooth"

});

}

// Start

loadHouses();