/* ==========================================
   PRAVAH 2026
   script.js
==========================================*/

/* ==========================================
   COUNTDOWN TIMER
==========================================*/

const eventDate = new Date("July 10, 2026 09:00:00").getTime();

const countdown = setInterval(function () {

    const now = new Date().getTime();

    const distance = eventDate - now;

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));

    const hours = Math.floor(
        (distance % (1000 * 60 * 60 * 24)) /
        (1000 * 60 * 60)
    );

    const minutes = Math.floor(
        (distance % (1000 * 60 * 60)) /
        (1000 * 60)
    );

    const seconds = Math.floor(
        (distance % (1000 * 60)) /
        1000
    );

    document.getElementById("days").innerHTML =
        days.toString().padStart(2, "0");

    document.getElementById("hours").innerHTML =
        hours.toString().padStart(2, "0");

    document.getElementById("minutes").innerHTML =
        minutes.toString().padStart(2, "0");

    document.getElementById("seconds").innerHTML =
        seconds.toString().padStart(2, "0");

    if (distance < 0) {

        clearInterval(countdown);

        document.getElementById("days").innerHTML = "00";
        document.getElementById("hours").innerHTML = "00";
        document.getElementById("minutes").innerHTML = "00";
        document.getElementById("seconds").innerHTML = "00";

    }

}, 1000);

/* ==========================================
   STICKY NAVBAR
==========================================*/

window.addEventListener("scroll", function () {

    const navbar = document.querySelector(".glass-nav");

    if (window.scrollY > 80) {

        navbar.style.background = "#050816";

        navbar.style.boxShadow =
            "0 10px 30px rgba(0,0,0,.4)";

    } else {

        navbar.style.background =
            "rgba(8,12,30,.75)";

        navbar.style.boxShadow = "none";

    }

});

/* ==========================================
   SMOOTH SCROLL
==========================================*/

document.querySelectorAll('a[href^="#"]').forEach(anchor => {

    anchor.addEventListener("click", function (e) {

        e.preventDefault();

        const target = document.querySelector(this.getAttribute("href"));

        if (target) {

            target.scrollIntoView({

                behavior: "smooth"

            });

        }

    });

});

/* ==========================================
   MOBILE MENU AUTO CLOSE
==========================================*/

const navLinks = document.querySelectorAll(".nav-link");

const menu = document.querySelector(".navbar-collapse");

navLinks.forEach(link => {

    link.addEventListener("click", () => {

        if (menu.classList.contains("show")) {

            bootstrap.Collapse.getInstance(menu).hide();

        }

    });

});

/* ==========================================
   BACK TO TOP BUTTON
==========================================*/

const topBtn = document.getElementById("topBtn");

window.addEventListener("scroll", () => {

    if (window.scrollY > 400) {

        topBtn.style.display = "block";

    } else {

        topBtn.style.display = "none";

    }

});

topBtn.addEventListener("click", () => {

    window.scrollTo({

        top: 0,

        behavior: "smooth"

    });

});

/* ==========================================
   REGISTRATION FORM
==========================================*/

const registerForm = document.querySelector("#register form");

registerForm.addEventListener("submit", function (e) {

    e.preventDefault();

    alert("🎉 Thank you for registering for PRAVAH 2026!");

    registerForm.reset();

});
/* Floating Particles */

.particle{
position:fixed;
background:#00e5ff;
border-radius:50%;
pointer-events:none;
z-index:1;
box-shadow:0 0 15px #00e5ff;
}

/* Gallery Popup */

.image-popup{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,.9);
display:flex;
justify-content:center;
align-items:center;
z-index:99999;
}

.popup-content{
position:relative;
max-width:90%;
}

.popup-content img{
max-width:100%;
max-height:90vh;
border-radius:20px;
}

.close-popup{
position:absolute;
top:-20px;
right:-20px;
font-size:40px;
color:white;
cursor:pointer;
}

/* Ripple */

.btn{
position:relative;
overflow:hidden;
}

.ripple{
position:absolute;
border-radius:50%;
background:rgba(255,255,255,.5);
transform:scale(0);
animation:ripple .6s linear;
}

@keyframes ripple{

to{

transform:scale(4);

opacity:0;

}

}

.nav-link.active{

color:#00e5ff !important;
font-weight:700;

}