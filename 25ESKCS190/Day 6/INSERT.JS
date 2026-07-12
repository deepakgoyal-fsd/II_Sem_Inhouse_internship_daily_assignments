// Select HTML Elements

const container = document.getElementById("productContainer");

const loading = document.getElementById("loading");

const error = document.getElementById("error");

const search = document.getElementById("search");

const count = document.getElementById("count");


// Store all products

let allProducts = [];


// Fetch API

fetch("https://dummyjson.com/products")

.then((response)=>{

    if(!response.ok){

        throw new Error("Network Error");

    }

    return response.json();

})

.then((data)=>{

    loading.style.display="none";

    allProducts=data.products;

    displayProducts(allProducts);

})

.catch((err)=>{

    loading.style.display="none";

    error.innerHTML="Unable to load products.";

    console.log(err);

});


// Display Products

function displayProducts(products){

    container.innerHTML="";

    count.innerHTML=products.length;

    products.forEach((product)=>{

        container.innerHTML+=`

        <div class="col-md-4">

            <div class="card h-100">

                <img src="${product.thumbnail}" class="card-img-top">

                <div class="card-body">

                    <h5 class="card-title">

                        ${product.title}

                    </h5>

                    <p class="price">

                        ₹ ${product.price}

                    </p>

                    <p>

                        <strong>Category :</strong>

                        ${product.category}

                    </p>

                    <p class="rating">

                        ⭐ ${product.rating}

                    </p>

                    <p>

                        ${product.description.substring(0,70)}...

                    </p>

                </div>

            </div>

        </div>

        `;

    });

}


// Search Products

search.addEventListener("keyup",()=>{

    const value=search.value.toLowerCase();

    const filtered=allProducts.filter((product)=>{

        return product.title.toLowerCase().includes(value);

    });

    displayProducts(filtered);

});