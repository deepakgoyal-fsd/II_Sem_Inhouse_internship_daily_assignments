$(document).ready(function(){

    $(".show").click(function(){

        $(this)
        .siblings(".details")
        .slideDown(500);

    });

    $(".hide").click(function(){

        $(this)
        .siblings(".details")
        .slideUp(500);

    });

});