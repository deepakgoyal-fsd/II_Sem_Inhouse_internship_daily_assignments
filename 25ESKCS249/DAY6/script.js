const postContainer = document.getElementById("postContainer");
const loading = document.getElementById("loading");
const errorMessage = document.getElementById("errorMessage");
const searchInput = document.getElementById("searchInput");
const cardCount = document.getElementById("cardCount");

let allPosts = [];


// Fetch Posts API

async function getPosts() {

    try {

        loading.classList.remove("d-none");

        const response = await fetch(
            "https://jsonplaceholder.typicode.com/posts"
        );

        if (!response.ok) {
            throw new Error("Failed to fetch posts");
        }

        const data = await response.json();

        allPosts = data;

        displayPosts(allPosts);

    }

    catch (error) {

        errorMessage.classList.remove("d-none");

        errorMessage.innerText =
            "Error: " + error.message;

    }

    finally {

        loading.classList.add("d-none");

    }

}


// Display Cards

function displayPosts(posts) {

    postContainer.innerHTML = "";

    cardCount.innerText = posts.length + " Posts";


    if (posts.length === 0) {

        postContainer.innerHTML = `
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    No Posts Found
                </div>
            </div>
        `;

        return;

    }


    posts.forEach(function (post) {

        const card = `

        <div class="col-lg-4 col-md-6">

            <div class="card post-card shadow">

                <div class="card-body">

                    <div class="card-number mb-3">
                        ${post.id}
                    </div>

                    <h5 class="card-title">
                        ${post.title}
                    </h5>

                    <p class="card-text">
                        ${post.body}
                    </p>

                    <span class="badge bg-dark">
                        User ID: ${post.userId}
                    </span>

                </div>

            </div>

        </div>

        `;

        postContainer.innerHTML += card;

    });

}


// Search Function

searchInput.addEventListener("input", function () {

    const searchValue =
        searchInput.value.toLowerCase();

    const filteredPosts = allPosts.filter(function (post) {

        return post.title
            .toLowerCase()
            .includes(searchValue);

    });

    displayPosts(filteredPosts);

});


// Call API

getPosts();