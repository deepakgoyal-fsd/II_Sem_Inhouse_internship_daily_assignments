$(document).ready(function () {

    // Hide all details initially
    $(".details").hide();

    // Show / Hide Details
    $(".btn").click(function () {

        var details = $(this).next(".details");

        details.stop().slideToggle(600);

        if ($(this).text() == "Show Details") {

            $(this).text("Hide Details");

            $(this).css({
                "background": "#ff4757",
                "color": "#fff"
            });

        } else {

            $(this).text("Show Details");

            $(this).css({
                "background": "#00e5ff",
                "color": "#000"
            });

        }

    });

    // Card Hover Animation
    $(".card").hover(

        function () {

            $(this).stop().animate({

                marginTop: "-10px"

            }, 300);

        },

        function () {

            $(this).stop().animate({

                marginTop: "0px"

            }, 300);

        }

    );

    // Icon Rotation
    $(".icon").hover(

        function () {

            $(this).css({

                "transform": "rotate(360deg) scale(1.2)",
                "transition": "0.7s"

            });

        },

        function () {

            $(this).css({

                "transform": "rotate(0deg) scale(1)"

            });

        }

    );

    // Button Glow Effect
    $(".btn").hover(

        function () {

            $(this).animate({

                opacity: 0.8

            }, 200);

        },

        function () {

            $(this).animate({

                opacity: 1

            }, 200);

        }

    );

    // Fade Cards on Page Load
    $(".card").hide().each(function (index) {

        $(this).delay(index * 300).fadeIn(800);

    });

});