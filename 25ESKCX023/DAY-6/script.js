let photos = [];

function loadPhotos() {

    $("#message").html("Loading photos...");
    $("#photo-container").html("");

    fetch("https://jsonplaceholder.typicode.com/photos?_limit=20")
        .then(response => response.json())
        .then(data => {

            photos = data;

            displayPhotos(photos);

            $("#count").text("Total Photos: " + photos.length);

            $("#message").html("");

        })
        .catch(error => {

            $("#message").html(`
                <p class="text-danger">
                    Unable to load photos.
                </p>
                <button class="btn btn-primary" onclick="loadPhotos()">
                    Retry
                </button>
            `);

        });

}

function displayPhotos(photoList) {

    let cards = "";

    photoList.forEach(photo => {

        cards += `
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100">

                    <img src="https://picsum.photos/300/200?random=${photo.id}" class="card-img-top" alt ="Photo">
                    <div class="card-body">

                        <h6 class="card-title">
                            ${photo.title}
                        </h6>

                        <p class="text-muted">
                            Photo ID: ${photo.id}
                        </p>

                    </div>
                </div>
            </div>
        `;

    });

    $("#photo-container").html(cards);

}

$("#search").on("keyup", function () {

    let searchText = $(this).val().toLowerCase();

    let filteredPhotos = photos.filter(photo =>
        photo.title.toLowerCase().includes(searchText)
    );

    displayPhotos(filteredPhotos);

    $("#count").text("Total Photos: " + filteredPhotos.length);

});

loadPhotos();