// ================================
// Smooth Scrolling
// ================================

$(document).ready(function () {

    $(".nav-link").click(function (e) {

        e.preventDefault();

        let target = $(this).attr("href");

        $("html, body").animate({

            scrollTop: $(target).offset().top - 70

        }, 800);

    });

});


// ================================
// Hero Button Smooth Scroll
// ================================

$(".btn-warning").click(function (e) {

    e.preventDefault();

    $("html, body").animate({

        scrollTop: $("#pricing").offset().top - 70

    }, 800);

});


// ================================
// Back To Top Button
// ================================

$(window).scroll(function () {

    if ($(this).scrollTop() > 250) {

        $("#topBtn").fadeIn();

    } else {

        $("#topBtn").fadeOut();

    }

});


$("#topBtn").click(function () {

    $("html, body").animate({

        scrollTop: 0

    }, 800);

});


// ================================
// Sticky Navbar Shadow
// ================================

$(window).scroll(function () {

    if ($(window).scrollTop() > 50) {

        $(".navbar").addClass("shadow-lg");

    } else {

        $(".navbar").removeClass("shadow-lg");

    }

});


// ================================
// Fade In Animation
// ================================

function reveal() {

    $(".feature-card, .testimonial-card, .price-card, .accordion-item").each(function () {

        let windowHeight = $(window).height();

        let top = $(this).offset().top;

        let revealPoint = 120;

        if (top < $(window).scrollTop() + windowHeight - revealPoint) {

            $(this).addClass("show");

        }

    });

}

$(".feature-card").addClass("fade-in");
$(".testimonial-card").addClass("fade-in");
$(".price-card").addClass("fade-in");
$(".accordion-item").addClass("fade-in");

$(window).on("scroll", reveal);

reveal();


// ================================
// Pricing Button Alert
// ================================

$(".price-card button").click(function () {

    let plan = $(this).closest(".price-card").find("h3").text();

    alert("You selected the " + plan + " Plan!");

});


// ================================
// Social Icon Hover Effect
// ================================

$(".social-icons a").hover(

    function () {

        $(this).stop().animate({

            marginTop: "-8px"

        }, 200);

    },

    function () {

        $(this).stop().animate({

            marginTop: "0px"

        }, 200);

    }

);


// ================================
// Testimonials Hover Effect
// ================================

$(".testimonial-card").hover(

    function () {

        $(this).css("transform", "scale(1.04)");

    },

    function () {

        $(this).css("transform", "scale(1)");

    }

);


// ================================
// Feature Card Hover Effect
// ================================

$(".feature-card").hover(

    function () {

        $(this).css({

            "background": "#0d6efd",

            "color": "#fff"

        });

    },

    function () {

        $(this).css({

            "background": "#fff",

            "color": "#000"

        });

    }

);


// ================================
// Navbar Active Link Highlight
// ================================

$(".nav-link").click(function () {

    $(".nav-link").removeClass("active");

    $(this).addClass("active");

});


// ================================
// Welcome Message
// ================================

console.log("EduLearn Landing Page Loaded Successfully!");
