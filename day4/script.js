// ===============================
// DARK / LIGHT MODE
// ===============================

const themeBtn = document.getElementById("theme-toggle");

themeBtn.addEventListener("click", () => {

    document.body.classList.toggle("light-mode");

    const icon = themeBtn.querySelector("i");

    if(document.body.classList.contains("light-mode")){

        icon.classList.remove("fa-moon");
        icon.classList.add("fa-sun");

    }else{

        icon.classList.remove("fa-sun");
        icon.classList.add("fa-moon");

    }

});

// ===============================
// SMOOTH SCROLL
// ===============================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {

    anchor.addEventListener("click", function(e){

        e.preventDefault();

        const target = document.querySelector(this.getAttribute("href"));

        if(target){

            target.scrollIntoView({

                behavior:"smooth"

            });

        }

    });

});

// ===============================
// NAVBAR SHADOW
// ===============================

window.addEventListener("scroll", ()=>{

    const header=document.querySelector("header");

    if(window.scrollY>50){

        header.style.boxShadow="0 4px 20px rgba(0,0,0,.3)";

    }else{

        header.style.boxShadow="none";

    }

});

// ===============================
// ANIMATED COUNTERS
// ===============================

const counters=document.querySelectorAll(".stat-box h2");

counters.forEach(counter=>{

    const updateCounter=()=>{

        const target=Number(counter.innerText.replace("+",""));

        const count=Number(counter.innerText.replace("+",""));

        let current=0;

        const increment=Math.ceil(target/100);

        const interval=setInterval(()=>{

            current+=increment;

            if(current>=target){

                counter.innerText=target+"+";

                clearInterval(interval);

            }else{

                counter.innerText=current+"+";

            }

        },20);

    }

    updateCounter();

});

// ===============================
// CONTACT FORM
// ===============================

const contactForm=document.querySelector(".contact-form");

if(contactForm){

contactForm.addEventListener("submit",(e)=>{

e.preventDefault();

alert("✅ Thank you! Your message has been sent successfully.");

contactForm.reset();

});

}

// ===============================
// NEWSLETTER
// ===============================

const newsletter=document.querySelector(".newsletter-form");

if(newsletter){

newsletter.addEventListener("submit",(e)=>{

e.preventDefault();

alert("🎉 Thank you for subscribing to our newsletter!");

newsletter.reset();

});

}

// ===============================
// SCROLL REVEAL ANIMATION
// ===============================

const revealElements=document.querySelectorAll(

".service-card,.team-card,.testimonial-card,.why-card,.stat-box"

);

window.addEventListener("scroll",()=>{

revealElements.forEach(element=>{

const windowHeight=window.innerHeight;

const revealTop=element.getBoundingClientRect().top;

const revealPoint=120;

if(revealTop<windowHeight-revealPoint){

element.style.opacity="1";

element.style.transform="translateY(0)";

}

});

});

// ===============================
// INITIAL STYLES
// ===============================

revealElements.forEach(element=>{

element.style.opacity="0";

element.style.transform="translateY(50px)";

element.style.transition="0.8s";

});

console.log("✅ TechNova Website Loaded Successfully");