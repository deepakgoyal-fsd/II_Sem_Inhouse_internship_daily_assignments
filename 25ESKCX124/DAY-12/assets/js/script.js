$(document).ready(function () {

    $("#clickBtn").click(function () {

        $.ajax({
            url: "click-counter.php",
            type: "GET",
            success: function (response) {
                $("#count").text(response);
            },
            error: function () {
                alert("Error connecting to click-counter.php");
            }
        });

    });

});