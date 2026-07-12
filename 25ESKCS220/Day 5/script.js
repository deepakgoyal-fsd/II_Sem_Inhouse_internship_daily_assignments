

let buttons = document.querySelectorAll(".btn");

buttons.forEach(function(button){

    button.onclick = function(){

        let details = this.previousElementSibling;

        if(details.style.display == "block"){

            details.style.display = "none";
            this.innerHTML = "View Details";

        }

        else{

            details.style.display = "block";
            this.innerHTML = "Hide Details";

        }

    }

});



// Search Student

let search = document.getElementById("search");

search.onkeyup = function(){

    let text = search.value.toLowerCase();

    let cards = document.querySelectorAll(".card");

    cards.forEach(function(card){

        let name = card.querySelector("h2").innerHTML.toLowerCase();

        if(name.includes(text)){

            card.style.display = "block";

        }

        else{

            card.style.display = "none";

        }

    });

};