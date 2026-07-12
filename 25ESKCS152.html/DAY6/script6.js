const productContainer = document.getElementById("productContainer");

const loading = document.getElementById("loading");

const error = document.getElementById("error");

const searchInput = document.getElementById("searchInput");

const count = document.getElementById("count");

let products = [];

// Fetch Products

async function fetchProducts(){

    loading.style.display="block";

    error.classList.add("d-none");

    try{

        const response = await fetch("https://fakestoreapi.com/products");

        if(!response.ok){

            throw new Error("Error");

        }

        products = await response.json();

        displayProducts(products);

    }

    catch(err){

        error.classList.remove("d-none");

    }

    finally{

        loading.style.display="none";

    }

}

// Display Products

function displayProducts(items){

    productContainer.innerHTML="";

    count.innerText=items.length;

    items.forEach(product=>{

        productContainer.innerHTML += `

        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">

            <div class="card">

                <img src="${product.image}" class="card-img-top">

                <div class="card-body d-flex flex-column">

                    <h5 class="card-title">

                        ${product.title}

                    </h5>

                    <p class="category">

                        ${product.category}

                    </p>

                    <p class="card-text">

                        ${product.description}

                    </p>

                    <div class="mt-auto">

                        <p class="price">

                            $${product.price}

                        </p>

                    </div>

                </div>

            </div>

        </div>

        `;

    });

}

// Search

searchInput.addEventListener("keyup",()=>{

    const value = searchInput.value.toLowerCase();

    const filtered = products.filter(product=>{

        return product.title.toLowerCase().includes(value);

    });

    displayProducts(filtered);

});

// Start

fetchProducts();