const PHOTO_API =
    "https://jsonplaceholder.typicode.com/photos";


let allPhotos = [];


$(document).ready(function () {

    loadPhotos();


    $("#photo-search").on(
        "input",
        function () {

            displayPhotos();

        }
    );

});


function loadPhotos() {

    $("#photo-count").text("0 Photos");


    $("#photo-container").html(`

        <div class="col-12">

            <div class="loading-box shadow-sm">

                <div class="state-icon mb-3">

                    <i
                        class="
                            fa-solid
                            fa-spinner
                            fa-spin
                        "
                    ></i>

                </div>

                <h4 class="fw-bold">

                    Loading photos...

                </h4>

                <p class="text-muted mb-0">

                    Fetching live gallery data.

                </p>

            </div>

        </div>

    `);


    setTimeout(function () {

        fetch(PHOTO_API)

            .then(function (response) {

                if (!response.ok) {

                    throw new Error(
                        "Unable to fetch photos"
                    );

                }


                return response.json();

            })


            .then(function (data) {

                allPhotos =
                    data.slice(0, 100);


                displayPhotos();

            })


            .catch(function (error) {

                console.error(error);

                showPhotoError();

            });

    }, 500);

}


function displayPhotos() {

    let searchValue =
        $("#photo-search")
            .val()
            .toLowerCase()
            .trim();


    let filteredPhotos =
        allPhotos.filter(
            function (photo) {

                return photo.title
                    .toLowerCase()
                    .includes(searchValue);

            }
        );


    $("#photo-count").text(

        filteredPhotos.length +

        (
            filteredPhotos.length === 1
                ? " Photo"
                : " Photos"
        )

    );


    if (filteredPhotos.length === 0) {

        $("#photo-container").html(`

            <div class="col-12">

                <div class="empty-box shadow-sm">

                    <div class="state-icon mb-3">

                        <i
                            class="
                                fa-solid
                                fa-image
                            "
                        ></i>

                    </div>

                    <h4 class="fw-bold">

                        No photos found

                    </h4>

                    <p class="text-muted mb-0">

                        Try a different
                        search title.

                    </p>

                </div>

            </div>

        `);


        return;

    }


    let cards = "";


    filteredPhotos.forEach(
        function (photo) {

            cards += `

                <div
                    class="
                        col-12
                        col-sm-6
                        col-lg-4
                        col-xl-3
                    "
                >

                    <div
                        class="
                            card
                            photo-card
                            shadow-sm
                        "
                    >

                        <img
                            src="
                                https://picsum.photos/seed/${photo.id}/500/350
                            "
                            class="photo-image"
                            alt="${photo.title}"
                        >


                        <div class="card-body p-4">

                            <span
                                class="
                                    photo-id
                                    mb-3
                                "
                            >

                                <i
                                    class="
                                        fa-solid
                                        fa-hashtag
                                    "
                                ></i>

                                ${photo.id}

                            </span>


                            <h5
                                class="
                                    photo-title
                                    mb-0
                                "
                            >

                                ${photo.title}

                            </h5>

                        </div>

                    </div>

                </div>

            `;

        }
    );


    $("#photo-container").html(cards);

}


function showPhotoError() {

    $("#photo-count").text("0 Photos");


    $("#photo-container").html(`

        <div class="col-12">

            <div class="error-box shadow-sm">

                <div
                    class="
                        state-icon
                        error-icon
                        mb-3
                    "
                >

                    <i
                        class="
                            fa-solid
                            fa-triangle-exclamation
                        "
                    ></i>

                </div>

                <h4 class="fw-bold">

                    Unable to load photos.

                </h4>

                <p class="text-muted">

                    Please check your
                    internet connection
                    and try again.

                </p>

                <button
                    class="
                        btn
                        btn-primary
                        px-4
                    "
                    onclick="loadPhotos()"
                >

                    <i
                        class="
                            fa-solid
                            fa-rotate-right
                            me-2
                        "
                    ></i>

                    Retry

                </button>

            </div>

        </div>

    `);

}