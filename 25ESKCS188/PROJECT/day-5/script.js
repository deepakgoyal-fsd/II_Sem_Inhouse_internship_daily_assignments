$(document).ready(function(){

    // Bonus
    $(".container").hide().fadeIn(1500);

    $(".btn-details").click(function(){

        $(this)
        .closest(".card")
        .find(".details")
        .slideToggle(500);

        if($(this).text()=="Show Details")
        {
            $(this).text("Hide Details");
        }
        else
        {
            $(this).text("Show Details");
        }

        $(this).toggleClass("active");

    });

});