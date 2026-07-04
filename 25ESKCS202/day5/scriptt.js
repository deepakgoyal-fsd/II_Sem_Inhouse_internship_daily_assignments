$(document).ready(function () {

    // Show / Hide Details + Change Button Text + Animate Card

    $(".btn").click(function () {

        $(this).next(".details").slideToggle(500);

        if ($(this).text() == "Show Details") {

            $(this).text("Hide Details");

            $(this).css({
                "background": "linear-gradient(45deg,#ff512f,#dd2476)"
            });

            $(this).parent().animate({
                opacity: "0.95"
            }, 200);

            $(this).parent().css({
                "box-shadow": "0 0 35px #00ffff",
                "border": "2px solid cyan"
            });

        } else {

            $(this).text("Show Details");

            $(this).css({
                "background": "linear-gradient(45deg,#00f5ff,#6a11cb)"
            });

            $(this).parent().css({
                "box-shadow": "0 0 25px rgba(0,255,255,.3)",
                "border": "2px solid rgba(255,255,255,.15)"
            });

        }

    });

    // Search Robot

    $("#search").keyup(function () {

        var value = $(this).val().toLowerCase();

        $(".card").filter(function () {

            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);

        });

    });

    // Card Hover Animation

    $(".card").hover(function () {

        $(this).stop().animate({

            marginTop: "-10px"

        }, 250);

    }, function () {

        $(this).stop().animate({

            marginTop: "0px"

        }, 250);

    });

    // Auto Changing Heading Color

    setInterval(function () {

        $(".hero h2").fadeOut(400).fadeIn(400);

    }, 3000);

    // Navbar Glow Animation

    setInterval(function () {

        $("nav h1").fadeToggle(500).fadeToggle(500);

    }, 2500);

    // Button Pulse Effect

    setInterval(function () {

        $(".btn").animate({

            opacity: 0.8

        }, 300).animate({

            opacity: 1

        }, 300);

    }, 2000);

});