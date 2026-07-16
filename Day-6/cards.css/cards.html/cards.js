const searchBox = document.getElementById("search");
const cards = document.querySelectorAll(".card");

searchBox.addEventListener("keyup", function () {

    let value = searchBox.value.toLowerCase();

    cards.forEach(function(card){

        let name =
        card.querySelector("h2").innerText.toLowerCase();

        let roll =
        card.querySelectorAll("p")[1].innerText.toLowerCase();

        if(name.includes(value) || roll.includes(value))
        {
            card.style.display = "block";
        }

        else{

            card.style.display = "none";
        }

    });

});



const modeBtn = document.getElementById("modeBtn");

modeBtn.addEventListener("click",function(){

    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark"))
    {
        modeBtn.innerHTML="☀ Light Mode";
    }

    else{

        modeBtn.innerHTML="🌙 Dark Mode";
    }

});


cards.forEach(function(card){

    card.addEventListener("click",function(){


        if(card.classList.contains("active"))
        {

            cards.forEach(function(c){

                c.classList.remove("active");

                c.style.display="block";

            });

            return;
        }



        cards.forEach(function(c){

            c.style.display="none";

            c.classList.remove("active");

        });



        card.style.display="block";

        card.classList.add("active");



        card.scrollIntoView({

            behavior:"smooth",

            block:"center"

        });

    });

});



document.addEventListener("keydown",function(e){

    if(e.key==="Escape")
    {

        cards.forEach(function(card){

            card.style.display="block";

            card.classList.remove("active");

        });

    }

});


window.addEventListener("load",function(){

    cards.forEach(function(card,index){

        card.style.opacity="0";

        card.style.transform="translateY(30px)";

        setTimeout(function(){

            card.style.transition=".5s";

            card.style.opacity="1";

            card.style.transform="translateY(0)";

        },index*80);

    });

});