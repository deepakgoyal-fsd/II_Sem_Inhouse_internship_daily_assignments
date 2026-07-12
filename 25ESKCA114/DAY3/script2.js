// ===========================
// COUNTER ANIMATION
// ===========================

const counters = document.querySelectorAll(".counter");

counters.forEach(counter => {

    const updateCounter = () => {

        const target = +counter.getAttribute("data-target");
        const current = +counter.innerText;

        const increment = target / 100;

        if(current < target){

            counter.innerText = Math.ceil(current + increment);

            setTimeout(updateCounter, 20);

        }
        else{

            counter.innerText = target + "+";

        }

    };


    updateCounter();

});




// ===========================
// BACK TO TOP BUTTON
// ===========================


const backToTop = document.getElementById("backToTop");


window.addEventListener("scroll", function(){

    if(window.scrollY > 300){

        backToTop.style.display = "block";

    }

    else{

        backToTop.style.display = "none";

    }

});



backToTop.addEventListener("click", function(){

    window.scrollTo({

        top:0,
        behavior:"smooth"

    });

});





// ===========================
// PASSWORD VALIDATION
// ===========================


const form = document.getElementById("extendedInquiryForm");

const password = document.getElementById("password");

const confirmPassword = document.getElementById("confirmPassword");



form.addEventListener("submit", function(event){


    if(password.value !== confirmPassword.value){


        event.preventDefault();


        alert("Password and Confirm Password do not match!");

        confirmPassword.focus();


        return false;


    }



    alert("Your inquiry has been submitted successfully!");


});





// ===========================
// NAVBAR ACTIVE EFFECT
// ===========================


const navLinks = document.querySelectorAll(".nav-link");


window.addEventListener("scroll", ()=>{


    let current = "";


    document.querySelectorAll("section").forEach(section=>{


        const sectionTop = section.offsetTop - 150;


        if(scrollY >= sectionTop){

            current = section.getAttribute("id");

        }


    });



    navLinks.forEach(link=>{


        link.classList.remove("active");


        if(link.getAttribute("href") === "#" + current){

            link.classList.add("active");

        }


    });


});form.addEventListener("submit", (e) => {

    e.preventDefault(); // Stop default submit

    const email = document.querySelector("#email").value;
    const msg = document.querySelector("#errorMsg");

    if (!email.includes("@")) {

        msg.textContent = "Please enter a valid email.";
        msg.style.color = "red";
        return; // Stop here

    }

    msg.textContent = "Form submitted successfully!";
    msg.style.color = "green";

});





// ===========================
// NAVBAR CLOSE AFTER CLICK
// ===========================


const navbarCollapse = document.querySelector(".navbar-collapse");

navLinks.forEach(link=>{


    link.addEventListener("click",()=>{


        if(navbarCollapse.classList.contains("show")){


            new bootstrap.Collapse(navbarCollapse).hide();


        }


    });


});
