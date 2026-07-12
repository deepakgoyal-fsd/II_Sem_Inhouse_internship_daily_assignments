const productContainer = document.getElementById("productContainer");
const loading = document.getElementById("loading");
const error = document.getElementById("error");
const searchBox = document.getElementById("searchBox");
const count = document.getElementById("count");

let products = [];

// Fetch Products
async function fetchProducts() {
    loading.style.display = "block";
    error.classList.add("d-none");

    try {
        const response = await fetch("https://dummyjson.com/products");

        if (!response.ok) {
            throw new Error("Failed to fetch products");
        }

        const data = await response.json();
        products = data.products;

        displayProducts(products);

    } catch (err) {
        error.classList.remove("d-none");
        error.textContent = "Error: " + err.message;

    } finally {
        loading.style.display = "none";
    }
}

// Display Products
function displayProducts(items) {
    productContainer.innerHTML = "";
    count.textContent = items.length;

    if (items.length === 0) {
        productContainer.innerHTML = `
            <div class="col-12 text-center">
                <h3 class="text-white">No Products Found</h3>
            </div>
        `;
        return;
    }

    items.forEach(product => {
        productContainer.innerHTML += `
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">

                    <img src="${product.thumbnail}" class="card-img-top" alt="${product.title}">

                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title">${product.title}</h5>

                        <span class="category">${product.category}</span>

                        <p class="brand">
                            <strong>Brand:</strong> ${product.brand}
                        </p>

                        <p class="price">$${product.price}</p>

                        <p class="rating">⭐ Rating: ${product.rating}</p>

                        <p class="stock">Stock: ${product.stock}</p>

                        <p class="card-text">${product.description}</p>

                        <button class="btn btn-primary btn-buy mt-auto">
                            Buy Now
                        </button>

                    </div>

                </div>
            </div>
        `;
    });
}

// Search Products
searchBox.addEventListener("input", () => {

    const searchValue = searchBox.value.toLowerCase();

    const filteredProducts = products.filter(product =>
        product.title.toLowerCase().includes(searchValue) ||
        product.brand.toLowerCase().includes(searchValue) ||
        product.category.toLowerCase().includes(searchValue)
    );

    displayProducts(filteredProducts);

});

// Load Products
fetchProducts();