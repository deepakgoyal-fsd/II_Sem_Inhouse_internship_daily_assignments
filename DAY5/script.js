$(document).ready(function(){

    // Fade In Animation
    $(".hero").hide().fadeIn(1200);

    $(".card").hide();

    $(".card").each(function(index){

        $(this).delay(index * 300).fadeIn(600);

    });

    // Show / Hide Details
    $(".btn-details").click(function(){

        $(this).next(".details").slideToggle(500);

        if($(this).text() == "Show Details"){

            $(this).text("Hide Details");

            $(this).css({
                background:"crimson",
                border:"crimson",
                color:"white"
            });

        }

        else{

            $(this).text("Show Details");

            $(this).css({
                background:"#0d6efd",
                border:"#0d6efd",
                color:"white"
            });

        }

    });

    // Card Hover Animation
    $(".card").hover(function(){

        $(this).css({
            transform:"scale(1.04)",
            transition:"0.3s"
        });

    },

    function(){

        $(this).css({
            transform:"scale(1)"
        });

    });

    // Navbar Effect
    $(".nav-link").hover(function(){

        $(this).css({
            color:"yellow"
        });

    },

    function(){

        $(this).css({
            color:"white"
        });

    });

    // Footer Icons Effect
    $(".fab").hover(function(){

        $(this).css({
            color:"cyan",
            transform:"scale(1.3)",
            transition:"0.3s"
        });

    },

    function(){

        $(this).css({
            color:"white",
            transform:"scale(1)"
        });

    });

});
