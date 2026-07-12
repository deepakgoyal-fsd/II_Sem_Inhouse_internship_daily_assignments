// ======================
// COUNTDOWN TIMER
// ======================

const eventDate = new Date("July 10, 2026 09:00:00").getTime();

const timer = setInterval(function () {

    const now = new Date().getTime();

    const distance = eventDate - now;

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));

    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

    if (distance < 0) {

        clearInterval(timer);

        document.getElementById("countdown").innerHTML =
            "<h2>🎉 PRAVAH 2026 HAS STARTED! 🎉</h2>";

    }

}, 1000);


// ======================
// NAVBAR COLOR CHANGE
// ======================

window.addEventListener("scroll", function () {

    const nav = document.querySelector("nav");

    if (window.scrollY > 80) {

        nav.style.background = "#4b2e18";

    } else {

        nav.style.background = "rgba(92,60,34,.92)";

    }

});


// ======================
// SMOOTH FADE ANIMATION
// ======================

const sections = document.querySelectorAll("section");

window.addEventListener("scroll", revealSections);

function revealSections() {

    const trigger = window.innerHeight - 120;

    sections.forEach(section => {

        const top = section.getBoundingClientRect().top;

        if (top < trigger) {

            section.style.opacity = "1";
            section.style.transform = "translateY(0px)";

        }

    });

}

sections.forEach(section => {

    section.style.opacity = "0";
    section.style.transform = "translateY(60px)";
    section.style.transition = "all 1s ease";

});

revealSections();


// ======================
// BACK TO TOP BUTTON
// ======================

const btn = document.createElement("button");

btn.innerHTML = "⬆";

btn.id = "topBtn";

document.body.appendChild(btn);

btn.style.position = "fixed";
btn.style.right = "25px";
btn.style.bottom = "25px";
btn.style.width = "50px";
btn.style.height = "50px";
btn.style.borderRadius = "50%";
btn.style.border = "none";
btn.style.background = "#8a4d1f";
btn.style.color = "white";
btn.style.fontSize = "22px";
btn.style.cursor = "pointer";
btn.style.display = "none";
btn.style.boxShadow = "0 5px 15px rgba(0,0,0,.3)";

window.addEventListener("scroll", () => {

    if (window.scrollY > 300) {

        btn.style.display = "block";

    } else {

        btn.style.display = "none";

    }

});

btn.onclick = () => {

    window.scrollTo({

        top: 0,
        behavior: "smooth"

    });

};


// ======================
// CARD HOVER EFFECT
// ======================

const cards = document.querySelectorAll(".card");

cards.forEach(card => {

    card.addEventListener("mouseenter", () => {

        card.style.transform = "translateY(-15px) scale(1.05)";

    });

    card.addEventListener("mouseleave", () => {

        card.style.transform = "translateY(0px) scale(1)";

    });

});


// ======================
// WELCOME MESSAGE
// ======================

window.onload = function () {

    console.log("Welcome to PRAVAH 2026");

};