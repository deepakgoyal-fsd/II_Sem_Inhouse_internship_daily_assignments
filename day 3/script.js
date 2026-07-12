// Wait until the HTML document is fully loaded
document.addEventListener("DOMContentLoaded", function () {
    
    // 1. Smooth Scrolling for internal anchor links (if any)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // 2. Alert when "Register Now" button is clicked
    const registerButtons = document.querySelectorAll('.btn-register');
    registerButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Optional: alert can be uncommented if we want an alert before redirect
            // alert("Redirecting to Registration form!");
        });
    });

    // 3. Active Navbar Highlighting
    // Get the current filename from URL (e.g., 'index.html')
    const currentLocation = location.pathname.split('/').pop() || 'index.html';
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        // If link href matches the current URL, add 'active' class
        if (link.getAttribute('href') === currentLocation) {
            link.classList.add('active');
            link.style.fontWeight = "bold";
        }
    });

    // 4. Registration Form Validation
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        registerForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent page refresh
            
            // Fetch values from inputs
            const name = document.getElementById('fullName').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            
            // Name cannot be empty
            if (name === "") {
                alert("Please enter your Full Name.");
                return;
            }
            
            // Email must be valid (simple check)
            if (email === "" || !email.includes('@')) {
                alert("Please enter a valid Email address.");
                return;
            }
            
            // Phone number must contain exactly 10 digits
            const phoneRegex = /^\d{10}$/;
            if (!phone.match(phoneRegex)) {
                alert("Please enter exactly 10 digits for the Phone Number.");
                return;
            }
            
            // 5. Success Message
            alert("Registration submitted successfully!");
            registerForm.reset(); // Clear form fields
        });
    }

    // Contact Form Validation & Success Message
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent page refresh
            alert("Thank you for contacting SKIT.");
            contactForm.reset(); // Clear form fields
        });
    }
});
