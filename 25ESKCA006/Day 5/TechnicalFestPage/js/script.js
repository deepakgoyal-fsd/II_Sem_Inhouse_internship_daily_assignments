/* =====================================================================
   PRAVAH 2026 — MAIN JAVASCRIPT FILE
   Beginner-friendly, well-commented, organized by feature.
   ===================================================================== */

/* Run everything only after the HTML document is fully loaded */
document.addEventListener("DOMContentLoaded", function () {

    /* =================================================================
       1. STICKY NAVBAR (adds a "scrolled" class when user scrolls down)
       ================================================================= */
    const mainNavbar = document.getElementById("mainNavbar");

    function handleNavbarScroll() {
        if (!mainNavbar) return;

        if (window.scrollY > 50) {
            mainNavbar.classList.add("scrolled");
        } else {
            mainNavbar.classList.remove("scrolled");
        }
    }

    // Run once on page load (in case user refreshes mid-scroll)
    handleNavbarScroll();
    window.addEventListener("scroll", handleNavbarScroll);


    /* =================================================================
       2. COUNTDOWN TIMER
       Change "eventDate" below to your actual event start date/time.
       ================================================================= */
    const eventDate = new Date("2026-09-10T09:00:00").getTime();

    const daysEl = document.getElementById("days");
    const hoursEl = document.getElementById("hours");
    const minutesEl = document.getElementById("minutes");
    const secondsEl = document.getElementById("seconds");

    function updateCountdown() {
        // Stop if countdown elements don't exist on this page
        if (!daysEl || !hoursEl || !minutesEl || !secondsEl) return;

        const now = new Date().getTime();
        const distance = eventDate - now;

        // If the event has already started/passed
        if (distance < 0) {
            daysEl.textContent = "00";
            hoursEl.textContent = "00";
            minutesEl.textContent = "00";
            secondsEl.textContent = "00";
            clearInterval(countdownInterval);
            return;
        }

        // Time calculations
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Add leading zero if number is less than 10
        daysEl.textContent = String(days).padStart(2, "0");
        hoursEl.textContent = String(hours).padStart(2, "0");
        minutesEl.textContent = String(minutes).padStart(2, "0");
        secondsEl.textContent = String(seconds).padStart(2, "0");
    }

    updateCountdown(); // run immediately so numbers don't flash "00" for a second
    const countdownInterval = setInterval(updateCountdown, 1000);


    /* =================================================================
       3. MOBILE NAVBAR TOGGLE IMPROVEMENTS
       Automatically closes the mobile menu after clicking a nav link.
       ================================================================= */
    const navbarCollapse = document.getElementById("navbarContent");
    const navLinks = document.querySelectorAll(".nav-link-custom, .navbar-nav .btn");

    navLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            if (navbarCollapse && navbarCollapse.classList.contains("show")) {
                // Use Bootstrap's Collapse API to close the menu smoothly
                const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse) ||
                    new bootstrap.Collapse(navbarCollapse, { toggle: false });
                bsCollapse.hide();
            }
        });
    });


    /* =================================================================
       4. SMOOTH SCROLLING FOR ANCHOR LINKS
       (CSS "scroll-behavior: smooth" already helps, but this adds
       an offset so sections aren't hidden behind the fixed navbar)
       ================================================================= */
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    const navbarHeight = mainNavbar ? mainNavbar.offsetHeight : 0;

    anchorLinks.forEach(function (anchor) {
        anchor.addEventListener("click", function (e) {
            const targetId = this.getAttribute("href");

            // Ignore empty "#" links
            if (targetId === "#" || targetId.length <= 1) return;

            const targetEl = document.querySelector(targetId);
            if (targetEl) {
                e.preventDefault();
                const targetPosition = targetEl.getBoundingClientRect().top + window.scrollY - navbarHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: "smooth"
                });
            }
        });
    });


    /* =================================================================
       5. SCROLL ANIMATIONS (fade/slide elements into view)
       Add class="reveal" to any element in HTML to animate it in.
       Uses IntersectionObserver for good performance.
       ================================================================= */
    const revealElements = document.querySelectorAll(".reveal");

    if ("IntersectionObserver" in window && revealElements.length > 0) {
        const revealObserver = new IntersectionObserver(function (entries, observer) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add("active");
                    observer.unobserve(entry.target); // animate only once
                }
            });
        }, {
            threshold: 0.15
        });

        revealElements.forEach(function (el) {
            revealObserver.observe(el);
        });
    }


    /* =================================================================
       6. FAQ ACCORDION ENHANCEMENTS
       Bootstrap already handles open/close. This adds a rotating
       icon effect by toggling a class on the button.
       ================================================================= */
    const accordionButtons = document.querySelectorAll(".accordion-button");

    accordionButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            // Small delay so the class toggles after Bootstrap's own logic
            setTimeout(function () {
                accordionButtons.forEach(function (btn) {
                    btn.classList.toggle("accordion-active", !btn.classList.contains("collapsed"));
                });
            }, 10);
        });
    });


    /* =================================================================
       7. DARK / LIGHT MODE TOGGLE
       Looks for a button with id="themeToggle" (add one in HTML,
       e.g. <button id="themeToggle" class="theme-toggle-btn">
       <i class="bi bi-moon-stars"></i></button>)
       Saves preference in localStorage so it persists across visits.
       ================================================================= */
    const themeToggleBtn = document.getElementById("themeToggle");
    const htmlElement = document.documentElement;

    // Load saved theme preference (default to light mode)
    const savedTheme = localStorage.getItem("pravah-theme") || "light";
    if (savedTheme === "dark") {
        htmlElement.setAttribute("data-theme", "dark");
    }
    updateThemeIcon();

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener("click", function () {
            const currentTheme = htmlElement.getAttribute("data-theme");

            if (currentTheme === "dark") {
                htmlElement.removeAttribute("data-theme");
                localStorage.setItem("pravah-theme", "light");
            } else {
                htmlElement.setAttribute("data-theme", "dark");
                localStorage.setItem("pravah-theme", "dark");
            }
            updateThemeIcon();
        });
    }

    function updateThemeIcon() {
        if (!themeToggleBtn) return;
        const icon = themeToggleBtn.querySelector("i");
        if (!icon) return;

        const isDark = htmlElement.getAttribute("data-theme") === "dark";
        icon.className = isDark ? "bi bi-sun" : "bi bi-moon-stars";
    }


    /* =================================================================
       8. BACK-TO-TOP BUTTON
       Shows the button after scrolling down, hides it near the top.
       ================================================================= */
    const backToTopBtn = document.getElementById("backToTop");

    function toggleBackToTop() {
        if (!backToTopBtn) return;

        if (window.scrollY > 400) {
            backToTopBtn.classList.add("show");
        } else {
            backToTopBtn.classList.remove("show");
        }
    }

    window.addEventListener("scroll", toggleBackToTop);
    toggleBackToTop(); // run once on load


    /* =================================================================
       9. SCROLL PROGRESS BAR
       Requires an element in HTML, e.g.:
       <div id="scrollProgressBar" class="scroll-progress-bar"></div>
       ================================================================= */
    const scrollProgressBar = document.getElementById("scrollProgressBar");

    function updateScrollProgress() {
        if (!scrollProgressBar) return;

        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;

        scrollProgressBar.style.width = scrollPercent + "%";
    }

    window.addEventListener("scroll", updateScrollProgress);
    updateScrollProgress(); // run once on load


    /* =================================================================
       10. NEWSLETTER FORM VALIDATION
       ================================================================= */
    const newsletterForm = document.querySelector(".newsletter-form");

    if (newsletterForm) {
        newsletterForm.addEventListener("submit", function (e) {
            const emailInput = newsletterForm.querySelector('input[type="email"]');
            const emailValue = emailInput.value.trim();

            if (!isValidEmail(emailValue)) {
                e.preventDefault();
                showFieldError(emailInput, "Please enter a valid email address.");
            } else {
                clearFieldError(emailInput);
                // Form will submit normally to subscribe.php
            }
        });

        // Clear error message as soon as user starts typing again
        const newsletterEmailInput = newsletterForm.querySelector('input[type="email"]');
        if (newsletterEmailInput) {
            newsletterEmailInput.addEventListener("input", function () {
                clearFieldError(newsletterEmailInput);
            });
        }
    }


    /* =================================================================
       11. GENERIC FORM VALIDATION HELPERS
       Reusable for the registration form (built in a future file) too.
       Any <form class="needs-validation"> will be validated on submit.
       ================================================================= */
    const validationForms = document.querySelectorAll(".needs-validation");

    validationForms.forEach(function (form) {
        form.addEventListener("submit", function (e) {
            let isFormValid = true;

            // Check all required fields inside this form
            const requiredFields = form.querySelectorAll("[required]");

            requiredFields.forEach(function (field) {
                const value = field.value.trim();

                if (value === "") {
                    isFormValid = false;
                    showFieldError(field, "This field is required.");
                } else if (field.type === "email" && !isValidEmail(value)) {
                    isFormValid = false;
                    showFieldError(field, "Please enter a valid email address.");
                } else if (field.type === "tel" && !isValidPhone(value)) {
                    isFormValid = false;
                    showFieldError(field, "Please enter a valid 10-digit phone number.");
                } else {
                    clearFieldError(field);
                }
            });

            if (!isFormValid) {
                e.preventDefault();
            }
        });
    });

    /* --- Validation utility functions --- */
    function isValidEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }

    function isValidPhone(phone) {
        const phonePattern = /^[6-9]\d{9}$/; // simple 10-digit Indian phone format
        return phonePattern.test(phone);
    }

    function showFieldError(field, message) {
        field.classList.add("is-invalid");

        // Reuse existing error message element if already created
        let errorEl = field.parentElement.querySelector(".field-error-message");
        if (!errorEl) {
            errorEl = document.createElement("div");
            errorEl.className = "field-error-message text-danger small mt-1";
            field.parentElement.appendChild(errorEl);
        }
        errorEl.textContent = message;
    }

    function clearFieldError(field) {
        field.classList.remove("is-invalid");
        const errorEl = field.parentElement.querySelector(".field-error-message");
        if (errorEl) {
            errorEl.remove();
        }
    }


    /* =================================================================
       12. PAGE LOADING ANIMATION
       Requires a loader element in HTML, e.g.:
       <div id="pageLoader" class="page-loader">
           <div class="loader-spinner"></div>
       </div>
       Hides the loader once the whole page (including images) is ready.
       ================================================================= */
    const pageLoader = document.getElementById("pageLoader");

    window.addEventListener("load", function () {
        if (pageLoader) {
            pageLoader.classList.add("loader-hidden");

            // Remove from DOM completely after the fade-out transition ends
            setTimeout(function () {
                pageLoader.style.display = "none";
            }, 600);
        }
    });

});