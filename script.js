// =======================================
// UserNest - script.js (Part 1)
// =======================================

const API = "https://jsonplaceholder.typicode.com/users";

let users = [];
let currentUsers = [];
let ascending = true;

// ================================
// Fetch Users
// ================================

function fetchUsers() {

    $("#loading").show();
    $("#error").addClass("d-none");
    $("#userContainer").empty();

    fetch(API)

        .then(response => {

            if (!response.ok) {
                throw new Error("Unable to fetch users.");
            }

            return response.json();

        })

        .then(data => {

            users = data;
            currentUsers = [...users];

            $("#loading").hide();

            renderUsers(currentUsers);

        })

        .catch(error => {

            $("#loading").hide();

            $("#error")
                .removeClass("d-none")
                .html("⚠ " + error.message);

        });

}

// ================================
// Render Users
// ================================

function renderUsers(data) {

    $("#userContainer").empty();

    $("#countBadge").html(`👥 Total Users : ${data.length}`);

    if (data.length === 0) {

        $("#noResult").removeClass("d-none");

        return;

    }

    $("#noResult").addClass("d-none");

    data.forEach(function (user, i) {

        let color = (i % 2 === 0) ? "even" : "odd";

        let image =
            `https://i.pravatar.cc/300?img=${user.id + 10}`;

        $("#userContainer").append(`

<div class="col-lg-4 col-md-6">

<div class="card user-card ${color}">

<img
src="${image}"
class="profile-img"
alt="${user.name}">

<div class="card-body">

<h4 class="card-title">

${user.name}

</h4>

<p class="card-text">

📧 ${user.email}

</p>

<p class="card-text">

🏢 ${user.company.name}

</p>

<p class="card-text">

📍 ${user.address.city}

</p>

<button
class="view-btn"
onclick="showDetails(${user.id})">

View Details

</button>

</div>

</div>

</div>

`);

    });

}

// ================================
// Search Users
// ================================

$("#search").on("keyup", function () {

    let value = $(this)
        .val()
        .toLowerCase();

    currentUsers = users.filter(function (user) {

        return (

            user.name.toLowerCase().includes(value)

            ||

            user.email.toLowerCase().includes(value)

            ||

            user.company.name.toLowerCase().includes(value)

            ||

            user.address.city.toLowerCase().includes(value)

        );

    });

    renderUsers(currentUsers);

});

// ================================
// Sort Users
// ================================

$("#sortBtn").click(function () {

    if (ascending) {

        currentUsers.sort(function (a, b) {

            return a.name.localeCompare(b.name);

        });

        $(this).text("Sort Z-A");

    }

    else {

        currentUsers.sort(function (a, b) {

            return b.name.localeCompare(a.name);

        });

        $(this).text("Sort A-Z");

    }

    ascending = !ascending;

    renderUsers(currentUsers);

});

// ================================
// View Details Modal
// ================================

function showDetails(id) {

    let user = users.find(function (u) {

        return u.id === id;

    });

    if (!user) return;

    $("#modalName").text(user.name);

    $("#modalEmail").text(user.email);

    $("#modalPhone").text(user.phone);

    $("#modalWebsite").text(user.website);

    $("#modalCompany").text(user.company.name);

    $("#modalCity").text(user.address.city);

    $("#modalImage").attr(
        "src",
        `https://i.pravatar.cc/300?img=${user.id + 10}`
    );

    const modal =
        new bootstrap.Modal(
            document.getElementById("userModal")
        );

    modal.show();

}
// ================================
// Scroll To Top Button
// ================================

$(window).scroll(function () {

    if ($(this).scrollTop() > 200) {

        $("#topBtn").fadeIn();

    }

    else {

        $("#topBtn").fadeOut();

    }

});

$("#topBtn").click(function () {

    $("html, body").animate({

        scrollTop: 0

    }, 600);

});

// ================================
// Card Hover Animation
// ================================

$(document).on("mouseenter", ".user-card", function () {

    $(this).css({

        transform: "translateY(-10px) scale(1.02)"

    });

});

$(document).on("mouseleave", ".user-card", function () {

    $(this).css({

        transform: "translateY(0)"

    });

});

// ================================
// Refresh Search on Empty
// ================================

$("#search").on("search", function () {

    currentUsers = [...users];

    renderUsers(currentUsers);

});

// ================================
// Optional Welcome Message
// ================================

setTimeout(function () {

    console.log("🌿 Welcome to UserNest");

}, 500);

// ================================
// Start Application
// ================================

fetchUsers();