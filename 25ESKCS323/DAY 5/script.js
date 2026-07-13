$(document).ready(function(){

    
    $("body").fadeIn(1000);

    $(".btn").click(function(){

        $(this).next(".details").slideToggle(500);

        if($(this).text()=="Show Details"){

            $(this).text("Hide Details");

            $(this).css({
                "background":"#e91e63"
            });

        }

        else{

            $(this).text("Show Details");

            $(this).css({
                "background":"#6a11cb"
            });

        }

    });

});