$(document).ready(function () {

    // Show registration form
    $(".registerBtn").click(function () {

        let eventName = $(this).closest(".card").find("h2").text();

        $("#selectedEvent").val(eventName);

        $("#registrationForm").slideDown(600);

        $("html, body").animate({
            scrollTop: $("#registrationForm").offset().top
        }, 700);

    });

    // Form Validation
    $("#registrationForm").submit(function (e) {

        e.preventDefault();

        let name = $("#name").val().trim();
        let email = $("#email").val().trim();
        let college = $("#college").val().trim();
        let phone = $("#phone").val().trim();

        if (name == "") {
            alert("Please enter your name.");
            return;
        }

        if (email == "") {
            alert("Please enter your email.");
            return;
        }

        if (college == "") {
            alert("Please enter your college.");
            return;
        }

        if (phone.length != 10 || isNaN(phone)) {
            alert("Enter a valid 10-digit phone number.");
            return;
        }

        if (!$("#agree").is(":checked")) {
            alert("Please accept the Terms & Conditions.");
            return;
        }

        alert("🎉 Registration Successful!");

        this.reset();

        $("#registrationForm").slideUp();

    });

});