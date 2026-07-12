$(document).ready(function () {
    $(".view-details-btn").on("click", function () {
        const button = $(this);
        const details = button.siblings(".student-details");
        const isOpen = button.attr("aria-expanded") === "true";

        details.stop(true, true).slideToggle(250);

        button.attr("aria-expanded", String(!isOpen));
        button.text(isOpen ? "View Details" : "Hide Details");
        button.toggleClass("btn-primary btn-outline-primary");
    });
});
