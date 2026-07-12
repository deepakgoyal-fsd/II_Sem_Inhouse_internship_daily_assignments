$(document).ready(function(){

    $(".detailsBtn").click(function(){

        let card=$(this).parent();

        $("#name").text(card.data("name"));
        $("#id").text(card.data("id"));
        $("#branch").text(card.data("branch"));
        $("#cgpa").text(card.data("cgpa"));
        $("#email").text(card.data("email"));
        $("#phone").text(card.data("phone"));

        $(".popup").fadeIn();

    });

    $(".close").click(function(){

        $(".popup").fadeOut();

    });

    $(".popup").click(function(e){

        if(e.target==this){

            $(".popup").fadeOut();

        }

    });

});