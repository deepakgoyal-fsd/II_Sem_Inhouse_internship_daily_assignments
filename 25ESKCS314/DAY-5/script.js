// Wait until page is loaded
$(document).ready(function () {

    // Hide all student details initially
    $(".details").hide();

    // Show / Hide Details
    $(".details-btn").click(function () {

        $(this).next(".details").slideToggle(400);

        if ($(this).text() === "Show Details") {
            $(this).text("Hide Details");
        } else {
            $(this).text("Show Details");
        }

    });

    // Smooth Scroll
    $("a[href^='#']").click(function (e) {

        e.preventDefault();

        let target = $(this.hash);

        $("html, body").animate({

            scrollTop: target.offset().top - 70

        }, 700);

    });

});

// =====================
// Live Search (DOM)
// =====================

const search = document.getElementById("search");
const cards = document.querySelectorAll(".student-card");

search.addEventListener("keyup", function () {

    let value = search.value.toLowerCase();

    cards.forEach(card => {

        let name = card.querySelector("h4").textContent.toLowerCase();

        let skills = card.querySelector("p").textContent.toLowerCase();

        if (name.includes(value) || skills.includes(value)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }

    });

});

// =====================
// Card Hover Effect
// =====================

cards.forEach(card => {

    card.addEventListener("mouseenter", function () {
        this.style.transition = "0.3s";
    });

});

// =====================
// Hero Button Effect
// =====================

const heroBtn = document.querySelector(".hero .btn");

heroBtn.addEventListener("mouseenter", function () {
    this.style.transform = "scale(1.08)";
});

heroBtn.addEventListener("mouseleave", function () {
    this.style.transform = "scale(1)";
});