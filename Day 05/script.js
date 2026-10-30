$(document).ready(function () {

    $(".btn-details").click(function () {

        const button = $(this);

        const details = button
            .closest(".card")
            .find(".details");

        details.slideToggle(300, function () {

            if ($(this).is(":visible")) {
                button.text("Hide Details");
            }
            else {
                button.text("Show Details");
            }

        });

    });

});