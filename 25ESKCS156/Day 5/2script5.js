$(document).ready(function(){

    $("#toggleBtn").click(function(){

        $("#details").slideToggle();

        if($(this).text() == "Show Details"){

            $(this).text("Hide Details");

        }

        else{

            $(this).text("Show Details");

        }

    });

});                 