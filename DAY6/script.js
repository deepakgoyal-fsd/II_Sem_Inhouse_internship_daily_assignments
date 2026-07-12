const productContainer=document.getElementById("productContainer");
const loading=document.getElementById("loading");
const error=document.getElementById("error");
const search=document.getElementById("search");
const count=document.getElementById("count");

let products=[];

fetch("https://dummyjson.com/products")

.then(response=>{

if(!response.ok){
throw new Error("Failed to fetch products");
}

return response.json();

})

.then(data=>{

loading.style.display="none";

products=data.products;

displayProducts(products);

})

.catch(err=>{

loading.style.display="none";

error.innerHTML=err.message;

});

function displayProducts(items){

productContainer.innerHTML="";

count.innerHTML=items.length;

items.forEach(product=>{

productContainer.innerHTML+=`

<div class="col-md-4 mb-4">

<div class="card h-100 shadow">

<img src="${product.thumbnail}" class="card-img-top">

<div class="card-body">

<h5>${product.title}</h5>

<p><b>Brand :</b> ${product.brand}</p>

<p><b>Category :</b> ${product.category}</p>

<p><b>Price :</b> $${product.price}</p>

<p><b>Rating :</b> ⭐ ${product.rating}</p>

</div>

</div>

</div>

`;

});

}

search.addEventListener("keyup",()=>{

let value=search.value.toLowerCase();

let filtered=products.filter(product=>

product.title.toLowerCase().includes(value)

);

displayProducts(filtered);

});