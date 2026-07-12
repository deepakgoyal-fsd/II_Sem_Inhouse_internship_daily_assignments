const API_URL =
    "https://jsonplaceholder.typicode.com/users";


let allUsers = [];


const indianProfiles = [

    {
        name: "Aarav Sharma",
        gender: "Male",
        photo:
            "https://randomuser.me/api/portraits/men/32.jpg"
    },

    {
        name: "Ananya Verma",
        gender: "Female",
        photo:
            "https://randomuser.me/api/portraits/women/44.jpg"
    },

    {
        name: "Arjun Mehta",
        gender: "Male",
        photo:
            "https://randomuser.me/api/portraits/men/46.jpg"
    },

    {
        name: "Ishita Gupta",
        gender: "Female",
        photo:
            "https://randomuser.me/api/portraits/women/65.jpg"
    },

    {
        name: "Rohan Kapoor",
        gender: "Male",
        photo:
            "https://randomuser.me/api/portraits/men/52.jpg"
    },

    {
        name: "Kavya Singh",
        gender: "Female",
        photo:
            "https://randomuser.me/api/portraits/women/68.jpg"
    },

    {
        name: "Aditya Joshi",
        gender: "Male",
        photo:
            "https://randomuser.me/api/portraits/men/75.jpg"
    },

    {
        name: "Meera Agarwal",
        gender: "Female",
        photo:
            "https://randomuser.me/api/portraits/women/79.jpg"
    },

    {
        name: "Siddharth Jain",
        gender: "Male",
        photo:
            "https://randomuser.me/api/portraits/men/81.jpg"
    },

    {
        name: "Nandini Rao",
        gender: "Female",
        photo:
            "https://randomuser.me/api/portraits/women/89.jpg"
    }

];


const indianCities = [

    "Jaipur",

    "Delhi",

    "Mumbai",

    "Bengaluru",

    "Pune",

    "Ahmedabad",

    "Hyderabad",

    "Lucknow",

    "Chandigarh",

    "Indore"

];


const indianCompanies = [

    "Tata Consultancy Services",

    "Infosys",

    "Wipro",

    "Tech Mahindra",

    "HCL Technologies",

    "Zoho",

    "Flipkart",

    "Paytm",

    "Razorpay",

    "Freshworks"

];


$(document).ready(function () {

    loadUsers();


    $("#search-input").on(
        "input",
        function () {

            displayUsers();

        }
    );


    $("#sort-select").on(
        "change",
        function () {

            displayUsers();

        }
    );

});


function loadUsers() {

    $("#user-count").text("0 Users");


    $("#user-container").html(`

        <div class="col-12">

            <div class="loading-box shadow-sm">

                <div class="loading-icon mb-3">

                    <i
                        class="fa-solid
                        fa-spinner
                        fa-spin"
                    ></i>

                </div>

                <h4 class="fw-bold">

                    Loading users...

                </h4>

                <p class="text-muted mb-0">

                    Fetching live user data.

                </p>

            </div>

        </div>

    `);


    setTimeout(function () {

        fetch(API_URL)

            .then(function (response) {

                if (!response.ok) {

                    throw new Error(
                        "Unable to fetch users"
                    );

                }


                return response.json();

            })


            .then(function (data) {

                allUsers =
                    data.map(
                        function (user, index) {

                            const profile =
                                indianProfiles[index];


                            return {

                                id:
                                    user.id,

                                name:
                                    profile.name,

                                gender:
                                    profile.gender,

                                photo:
                                    profile.photo,

                                username:
                                    profile.name
                                        .toLowerCase()
                                        .replaceAll(
                                            " ",
                                            "."
                                        ),

                                email:
                                    profile.name
                                        .toLowerCase()
                                        .replaceAll(
                                            " ",
                                            "."
                                        )
                                    +
                                    "@studentmail.in",

                                phone:
                                    "+91 98765 "
                                    +
                                    String(
                                        43210 + index
                                    ),

                                city:
                                    indianCities[index],

                                company:
                                    indianCompanies[index]

                            };

                        }
                    );


                displayUsers();

            })


            .catch(function (error) {

                console.error(error);

                showError();

            });

    }, 500);

}


function displayUsers() {

    let searchValue =
        $("#search-input")
            .val()
            .toLowerCase()
            .trim();


    let sortValue =
        $("#sort-select").val();


    let filteredUsers =
        allUsers.filter(
            function (user) {

                return user.name
                    .toLowerCase()
                    .includes(searchValue);

            }
        );


    if (sortValue === "az") {

        filteredUsers.sort(
            function (a, b) {

                return a.name.localeCompare(
                    b.name
                );

            }
        );

    }


    if (sortValue === "za") {

        filteredUsers.sort(
            function (a, b) {

                return b.name.localeCompare(
                    a.name
                );

            }
        );

    }


    $("#user-count").text(

        filteredUsers.length +

        (
            filteredUsers.length === 1
                ? " User"
                : " Users"
        )

    );


    if (filteredUsers.length === 0) {

        $("#user-container").html(`

            <div class="col-12">

                <div class="empty-box shadow-sm">

                    <div class="empty-icon mb-3">

                        <i
                            class="fa-solid
                            fa-user-slash"
                        ></i>

                    </div>

                    <h4 class="fw-bold">

                        No users found

                    </h4>

                    <p class="text-muted mb-0">

                        Try searching for
                        another name.

                    </p>

                </div>

            </div>

        `);


        return;

    }


    let cards = "";


    filteredUsers.forEach(
        function (user, index) {

            let alternateClass =
                index % 2 === 0
                    ? "teal-card"
                    : "";


            let genderClass =
                user.gender === "Female"
                    ? "female-badge"
                    : "male-badge";


            let genderIcon =
                user.gender === "Female"
                    ? "fa-venus"
                    : "fa-mars";


            cards += `

                <div
                    class="
                        col-12
                        col-md-6
                        col-lg-4
                    "
                >

                    <div
                        class="
                            card
                            user-card
                            shadow-sm
                            ${alternateClass}
                        "
                    >

                        <div class="card-body p-4">


                            <div
                                class="
                                    text-center
                                    mb-4
                                "
                            >

                                <img
                                    src="${user.photo}"
                                    alt="${user.name}"
                                    class="
                                        user-image
                                        mb-3
                                    "
                                >


                                <h3
                                    class="
                                        user-name
                                        mb-1
                                    "
                                >

                                    ${user.name}

                                </h3>


                                <p
                                    class="
                                        username
                                        mb-0
                                    "
                                >

                                    @${user.username}

                                </p>


                                <span
                                    class="
                                        gender-badge
                                        ${genderClass}
                                    "
                                >

                                    <i
                                        class="
                                            fa-solid
                                            ${genderIcon}
                                            me-1
                                        "
                                    ></i>

                                    ${user.gender}

                                </span>

                            </div>


                            <div class="info-item">

                                <i
                                    class="
                                        fa-solid
                                        fa-envelope
                                    "
                                ></i>

                                <span>

                                    ${user.email}

                                </span>

                            </div>


                            <div class="info-item">

                                <i
                                    class="
                                        fa-solid
                                        fa-phone
                                    "
                                ></i>

                                <span>

                                    ${user.phone}

                                </span>

                            </div>


                            <div class="info-item">

                                <i
                                    class="
                                        fa-solid
                                        fa-location-dot
                                    "
                                ></i>

                                <span>

                                    ${user.city},
                                    India

                                </span>

                            </div>


                            <div
                                class="
                                    text-center
                                    mt-4
                                "
                            >

                                <span
                                    class="
                                        company-badge
                                    "
                                >

                                    <i
                                        class="
                                            fa-solid
                                            fa-building
                                            me-1
                                        "
                                    ></i>

                                    ${user.company}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            `;

        }
    );


    $("#user-container").html(cards);

}


function showError() {

    $("#user-count").text("0 Users");


    $("#user-container").html(`

        <div class="col-12">

            <div class="error-box shadow-sm">

                <div class="error-icon mb-3">

                    <i
                        class="
                            fa-solid
                            fa-triangle-exclamation
                        "
                    ></i>

                </div>

                <h4 class="fw-bold">

                    Unable to load users.

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
                    onclick="loadUsers()"
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