// ======================================
// MOBILE NAVBAR
// ======================================

const menuBtn = document.querySelector(".menu-btn");
const navLinks = document.querySelector(".nav-links");

menuBtn.addEventListener("click", () => {
    navLinks.classList.toggle("active");
});

// Close navbar after clicking a link
document.querySelectorAll(".nav-links a").forEach(link => {
    link.addEventListener("click", () => {
        navLinks.classList.remove("active");
    });
});



// ======================================
// STICKY NAVBAR
// ======================================

const header = document.querySelector("header");

window.addEventListener("scroll", () => {

    if (window.scrollY > 80) {

        header.style.background = "rgba(15,15,15,0.95)";
        header.style.boxShadow = "0 10px 25px rgba(0,0,0,.4)";

    }

    else {

        header.style.background = "rgba(20,20,20,.45)";
        header.style.boxShadow = "none";

    }

});



// ======================================
// SCROLL REVEAL ANIMATION
// ======================================

const revealElements = document.querySelectorAll(".reveal");

const observer = new IntersectionObserver((entries) => {

    entries.forEach(entry => {

        if (entry.isIntersecting) {

            entry.target.classList.add("active");

        }

    });

}, {
    threshold: 0.2
});

revealElements.forEach(element => {

    observer.observe(element);

});



// ======================================
// SMOOTH ACTIVE NAVIGATION
// ======================================

const sections = document.querySelectorAll("section");
const navItems = document.querySelectorAll(".nav-links a");

window.addEventListener("scroll", () => {

    let current = "";

    sections.forEach(section => {

        const sectionTop = section.offsetTop - 150;
        const sectionHeight = section.clientHeight;

        if (window.scrollY >= sectionTop) {

            current = section.getAttribute("id");

        }

    });

    navItems.forEach(link => {

        link.classList.remove("active");

        if (link.getAttribute("href") === "#" + current) {

            link.classList.add("active");

        }

    });

});



// ======================================
// OPTIONAL IMAGE HOVER EFFECT
// ======================================

const galleryImages = document.querySelectorAll(".gallery-item img");

galleryImages.forEach(image => {

    image.addEventListener("mouseenter", () => {

        image.style.transform = "scale(1.08)";

    });

    image.addEventListener("mouseleave", () => {

        image.style.transform = "scale(1)";

    });

});



// ======================================
// BUTTON RIPPLE EFFECT
// ======================================

const buttons = document.querySelectorAll(".btn, .register-btn");

buttons.forEach(button => {

    button.addEventListener("click", function(e) {

        const ripple = document.createElement("span");

        const x = e.clientX - this.offsetLeft;
        const y = e.clientY - this.offsetTop;

        ripple.style.left = x + "px";
        ripple.style.top = y + "px";

        ripple.classList.add("ripple");

        this.appendChild(ripple);

        setTimeout(() => {

            ripple.remove();

        }, 600);

    });

});
// ======================================
// COUNTDOWN TIMER
// ======================================

// Change this if your registration deadline is different
const deadline = new Date("July 9, 2026 23:59:59").getTime();

const countdown = setInterval(() => {

    const now = new Date().getTime();

    const distance = deadline - now;

    if (distance <= 0) {

        clearInterval(countdown);

        document.getElementById("days").textContent = "00";
        document.getElementById("hours").textContent = "00";
        document.getElementById("minutes").textContent = "00";
        document.getElementById("seconds").textContent = "00";

        const registerBtn = document.querySelector(".register-btn");

        if(registerBtn){

            registerBtn.disabled = true;
            registerBtn.innerText = "Registration Closed";
            registerBtn.style.background = "gray";
            registerBtn.style.cursor = "not-allowed";

        }

        return;
    }

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

    document.getElementById("days").textContent =
        String(days).padStart(2, "0");

    document.getElementById("hours").textContent =
        String(hours).padStart(2, "0");

    document.getElementById("minutes").textContent =
        String(minutes).padStart(2, "0");

    document.getElementById("seconds").textContent =
        String(seconds).padStart(2, "0");

}, 1000);



// ======================================
// REGISTRATION FORM
// ======================================

const form = document.getElementById("registrationForm");

form.addEventListener("submit", async function(e){

    e.preventDefault();

    if(new Date().getTime() > deadline){

        alert("Registration has been closed.");

        return;

    }

    const studentData = {

        name: document.getElementById("name").value.trim(),

        rollNumber: document.getElementById("roll").value.trim(),

        email: document.getElementById("email").value.trim(),

        phone: document.getElementById("phone").value.trim(),

        branch: document.getElementById("branch").value,

        batch: document.getElementById("batch").value,

        year: document.getElementById("year").value,

        section: document.getElementById("section").value.trim(),

        gender: document.getElementById("gender").value,

        dob: document.getElementById("dob").value,

        event: document.getElementById("event").value,

        tshirtSize: document.getElementById("size").value,

        reason: document.getElementById("reason").value.trim()

    };


    // Basic Validation

    if(studentData.name.length < 3){

        alert("Please enter a valid name.");

        return;

    }

    if(studentData.rollNumber === ""){

        alert("Roll Number is required.");

        return;

    }

    if(studentData.phone.length != 10){

        alert("Phone number should contain 10 digits.");

        return;

    }



    try{

        const response = await fetch("http://localhost:5000/register",{

            method:"POST",

            headers:{
                "Content-Type":"application/json"
            },

            body:JSON.stringify(studentData)

        });


        const result = await response.json();


        if(response.ok){

            alert("🎉 Registration Successful!");

            form.reset();

        }

        else{

            alert(result.message || "Registration Failed");

        }

    }

    catch(error){

        console.error(error);

        alert("Cannot connect to server.");

    }

});



// ======================================
// INPUT ANIMATION
// ======================================

const inputs = document.querySelectorAll("input, textarea, select");

inputs.forEach(input=>{

    input.addEventListener("focus",()=>{

        input.style.transform="scale(1.02)";

    });

    input.addEventListener("blur",()=>{

        input.style.transform="scale(1)";

    });

});



// ======================================
// PAGE LOADED
// ======================================

window.addEventListener("load",()=>{

    console.log("PRAVAH Website Loaded Successfully.");

});