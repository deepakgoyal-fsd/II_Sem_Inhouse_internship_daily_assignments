$(document).ready(function () {

    // Bonus: Fade in page
    $("body").fadeIn(1000);

    $(".btn-details").click(function () {

        let details = $(this).siblings(".details");

        details.slideToggle(500);

        if ($(this).text() === "Show Details") {

            $(this).text("Hide Details");

            $(this).css({
                "background":"crimson"
            });

        } else {

            $(this).text("Show Details");

            $(this).css({
                "background":"#007bff"
            });

        }

    });

});