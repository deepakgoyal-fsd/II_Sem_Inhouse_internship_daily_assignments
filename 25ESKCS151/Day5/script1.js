$(document).ready(function () {

    // Hide all details when page loads
    $(".details").hide();

    // Show / Hide Details Button
    $(".details-btn").click(function () {

        let details = $(this).siblings(".details");

        details.slideToggle(500);

        if ($(this).text() === "Show Details") {

            $(this).text("Hide Details");

            $(this).css({
                "background": "#ff4d6d",
                "color": "#ffffff",
                "box-shadow": "0 0 20px #ff4d6d"
            });

        } else {

            $(this).text("Show Details");

            $(this).css({
                "background": "#00f5ff",
                "color": "#000000",
                "box-shadow": "0 0 20px #00f5ff"
            });

        }

    });

    // Search Student
    $("#search").on("keyup", function () {

        let value = $(this).val().toLowerCase();

        $(".card").filter(function () {

            $(this).toggle(
                $(this).text().toLowerCase().indexOf(value) > -1
            );

        });

    });

    // Card Hover Animation
    $(".card").hover(function () {

        $(this).css({
            "transform": "translateY(-10px) scale(1.03)",
            "transition": "0.4s"
        });

    }, function () {

        $(this).css({
            "transform": "translateY(0px) scale(1)"
        });

    });

    // Image Animation
    $(".card img").hover(function () {

        $(this).css({
            "transform": "scale(1.1) rotate(8deg)",
            "transition": "0.4s"
        });

    }, function () {

        $(this).css({
            "transform": "scale(1) rotate(0deg)"
        });

    });

    // Button Hover Effect
    $(".details-btn").hover(function () {

        $(this).css({
            "transform": "scale(1.08)"
        });

    }, function () {

        $(this).css({
            "transform": "scale(1)"
        });

    });

    // Welcome Animation
    $("header").hide().fadeIn(1200);

    $(".card").hide();

    $(".card").each(function (index) {

        $(this).delay(index * 250).fadeIn(600);

    });

});