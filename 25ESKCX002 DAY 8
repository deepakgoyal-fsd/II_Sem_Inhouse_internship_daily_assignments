/*==================================================
PRAVAH 2026 JAVASCRIPT
SKIT JAIPUR FEST WEBSITE
==================================================*/


// ================================================
// PAGE LOADER
// ================================================

window.addEventListener("load", function(){

    let loader = document.getElementById("loader");

    if(loader){

        loader.style.display = "none";

    }

});



// ================================================
// AOS ANIMATION INITIALIZATION
// ================================================


AOS.init({

    duration:1000,

    once:true,

});



// ================================================
// COUNTDOWN TIMER
// ================================================


let festivalDate = new Date("March 15, 2026 10:00:00").getTime();



let countdown = setInterval(function(){


    let now = new Date().getTime();


    let distance = festivalDate - now;



    let days = Math.floor(

        distance/(1000*60*60*24)

    );


    let hours = Math.floor(

        (distance%(1000*60*60*24))

        /(1000*60*60)

    );


    let minutes = Math.floor(

        (distance%(1000*60*60))

        /(1000*60)

    );


    let seconds = Math.floor(

        (distance%(1000*60))

        /1000

    );



    let dayBox = document.getElementById("days");

    let hourBox = document.getElementById("hours");

    let minuteBox = document.getElementById("minutes");

    let secondBox = document.getElementById("seconds");



    if(dayBox){

        dayBox.innerHTML = days;

    }


    if(hourBox){

        hourBox.innerHTML = hours;

    }


    if(minuteBox){

        minuteBox.innerHTML = minutes;

    }


    if(secondBox){

        secondBox.innerHTML = seconds;

    }



    if(distance < 0){

        clearInterval(countdown);


        document.querySelector(".countdown")

        .innerHTML =

        "<h2>PRAVAH HAS STARTED 🎉</h2>";

    }



},1000);





// ================================================
// NAVBAR SCROLL EFFECT
// ================================================


window.addEventListener("scroll",function(){


    let navbar = document.querySelector(".navbar");


    if(window.scrollY > 50){


        navbar.style.background =

        "rgba(8,0,24,0.95)";


    }

    else{


        navbar.style.background =

        "rgba(8,0,24,0.7)";


    }



});





// ================================================
// BACK TO TOP BUTTON
// ================================================


let topButton = document.getElementById("topBtn");



window.addEventListener("scroll",function(){


    if(window.scrollY > 400){


        topButton.style.display="block";


    }

    else{


        topButton.style.display="none";


    }


});




if(topButton){


    topButton.addEventListener(

        "click",

        function(){


            window.scrollTo({


                top:0,


                behavior:"smooth"


            });



        }

    );


}






// ================================================
// REGISTRATION FORM VALIDATION
// ================================================


let registrationForm = document.getElementById(

    "registrationForm"

);



if(registrationForm){



registrationForm.addEventListener(

"submit",

function(event){


    event.preventDefault();



    let name = document.getElementById("name").value.trim();


    let email = document.getElementById("email").value.trim();


    let phone = document.getElementById("phone").value.trim();


    let college = document.getElementById("college").value.trim();




    if(

        name==="" ||

        email==="" ||

        phone==="" ||

        college===""

    ){


        alert(

        "Please fill all required fields!"

        );


        return;


    }




    if(phone.length !== 10 || isNaN(phone)){


        alert(

        "Enter a valid 10 digit phone number!"

        );


        return;


    }




    alert(

    "🎉 Registration Successful! Welcome to PRAVAH 2026"

    );



    registrationForm.reset();



});


}






// ================================================
// SMOOTH SCROLL FOR NAV LINKS
// ================================================


document.querySelectorAll(

"nav a[href^='#']"

)

.forEach(function(link){


    link.addEventListener(

    "click",

    function(e){


        e.preventDefault();



        let target = document.querySelector(

            this.getAttribute("href")

        );



        if(target){


            target.scrollIntoView({


                behavior:"smooth"


            });


        }



    });


});





// ================================================
// EVENT CARD HOVER EFFECT
// ================================================


let cards = document.querySelectorAll(

".event-card, .sports-card, .why-card"

);



cards.forEach(function(card){


    card.addEventListener(

    "mouseenter",

    function(){


        this.style.transition=".3s";


    });


});



console.log(

"PRAVAH 2026 Website Loaded Successfully 🚀"

);
