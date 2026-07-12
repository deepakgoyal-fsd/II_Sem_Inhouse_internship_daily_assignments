$(document).ready(function() {
    // 1. Setup the Registration Date: July 23, 2026, 00:00:00
    const registrationDate = new Date("July 23, 2026 00:00:00").getTime();

    // 2. Countdown Logic
    const timer = setInterval(function() {
        const now = new Date().getTime();
        const distance = registrationDate - now;

        // Time calculations
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Update the DOM using jQuery
        $("#days").text(days < 10 ? "0" + days : days);
        $("#hours").text(hours < 10 ? "0" + hours : hours);
        $("#minutes").text(minutes < 10 ? "0" + minutes : minutes);
        $("#seconds").text(seconds < 10 ? "0" + seconds : seconds);

        // If the countdown is over
        if (distance < 0) {
            clearInterval(timer);
            $(".countdown-wrapper").html("<h3>Registration is now OPEN!</h3>");
            $(".notify-form").hide();
        }
    }, 1000);

    // 3. Form Submission Handling with jQuery
    $("#notify-form").on("submit", function(e) {
        e.preventDefault(); // Prevent page reload
        
        const email = $("#email").val();
        const $btn = $(this).find("button");
        
        // Simulate an API call / loading state
        $btn.text("Submitting...").prop("disabled", true);
        
        setTimeout(function() {
            // Success State
            $("#notify-form").slideUp(300); // Smoothly hide the form
            $("#form-message")
                .text(`Awesome! We will notify ${email} on July 10th.`)
                .removeClass("hidden")
                .hide()
                .fadeIn(500); // Smoothly show the success message
        }, 1200);
    });
});