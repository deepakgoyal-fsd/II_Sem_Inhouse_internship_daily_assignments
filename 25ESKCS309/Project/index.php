<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Real Time Form Validation | JavaScript Project</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="#page-top">Re..Form..ers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#validation">Validation</a></li>
                    <li class="nav-item"><a class="nav-link" href="#technology">Technology</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Re..Form..ers</div>
            <div class="masthead-heading text-uppercase"></div>
            <p class="text-white-75 mb-4" style="max-width:800px;margin:auto;">Re..Form..ers is a revolutionary platform designed to streamline the form validation process, making it faster and more efficient for users. Our goal is to enhance user experience by providing real-time feedback and validation, ensuring that all submitted data is accurate and complete.</p>
            <a class="btn btn-primary btn-xl text-uppercase" href="register.php">Register Now</a>
        </div>
    </header>

    <!-- Features Section -->
    <section class="page-section" id="features">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Project Features</h2>
                <h3 class="section-subheading text-muted">Main functionalities implemented in the project.</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-keyboard fa-stack-1x fa-inverse text-primary"></i>
                    </span>
                    <h4 class="my-3">Live Validation</h4>
                    <p class="text-muted">Checks every field instantly while the user types without refreshing the webpage.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle-check fa-stack-1x fa-inverse text-primary"></i>
                    </span>
                    <h4 class="my-3">Instant Feedback</h4>
                    <p class="text-muted">Displays success and error messages immediately using JavaScript validation.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-mobile-screen-button fa-stack-1x fa-inverse text-primary"></i>
                    </span>
                    <h4 class="my-3">Responsive Interface</h4>
                    <p class="text-muted">Designed using Bootstrap to work smoothly on desktop, tablet and mobile devices.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Validation Section -->
    <section class="page-section bg-light" id="validation">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Validation Process</h2>
                <h3 class="section-subheading text-muted">Validation techniques used in the project.</h3>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">Name Validation</h4>
                            <p class="text-primary fw-bold mb-2">Required Field</p>
                            <p class="text-muted mb-0">Checks that the name contains at least two characters and prevents empty submission.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">Email Validation</h4>
                            <p class="text-primary fw-bold mb-2">Regular Expression</p>
                            <p class="text-muted mb-0">Uses JavaScript Regular Expressions to verify the email format before submission.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">Mobile Validation</h4>
                            <p class="text-primary fw-bold mb-2">10 Digit Number</p>
                            <p class="text-muted mb-0">Allows only valid Indian mobile numbers beginning with digits 6–9.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">Submission Control</h4>
                            <p class="text-primary fw-bold mb-2">JavaScript Validation</p>
                            <p class="text-muted mb-0">The form submits only when every required field is validated successfully.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Technology Section -->
    <section class="page-section" id="technology">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Technologies Used</h2>
                <h3 class="section-subheading text-muted">Tools and technologies used in the project.</h3>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <ul class="list-group list-group-flush fs-5 shadow-sm">
                        <li class="list-group-item"><i class="fab fa-html5 text-danger me-2"></i> HTML5 for webpage structure</li>
                        <li class="list-group-item"><i class="fab fa-css3-alt text-primary me-2"></i> CSS3 for responsive styling</li>
                        <li class="list-group-item"><i class="fab fa-bootstrap text-purple me-2"></i> Bootstrap 5 for layout and components</li>
                        <li class="list-group-item"><i class="fab fa-js text-warning me-2"></i> JavaScript for real-time validation</li>
                        <li class="list-group-item"><i class="fab fa-php text-info me-2"></i> PHP for backend processing</li>
                        <li class="list-group-item"><i class="fas fa-database text-secondary me-2"></i> MySQL for storing user records</li>
                        <li class="list-group-item"><i class="fab fa-font-awesome text-dark me-2"></i> Font Awesome icons</li>
                        <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> Bootstrap Alerts and Form Validation</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact / Feedback Section -->
    <section class="page-section bg-light" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"> Contact Feedback Form</h2>
                <h3 class="section-subheading text-muted">Test the validation system by filling out the form below.</h3>
            </div>
            
            <!-- PHP Feedback Messages -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8">
                    <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                <?php foreach ($_SESSION['errors'] as $error) { echo "<li>$error</li>"; } ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php unset($_SESSION['errors']); } ?>

                    <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                <?php foreach ($_SESSION['success'] as $message) { echo "<li>$message</li>"; } ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php unset($_SESSION['success']); } ?>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0" style="border-radius: 16px;">
                        <div class="card-body p-5">
                            <form action="process_contact.php" method="POST" id="contactForm" novalidate>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-dark" for="contactName">Student Full Name <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                                            <input class="form-control" type="text" name="name" id="contactName" placeholder="Enter your full name" required />
                                        </div>
                                        <small class="text-danger d-none" id="nameError"><i class="fas fa-exclamation-circle"></i> Name is required (min 2 characters)</small>
                                        <small class="text-success d-none" id="nameSuccess"><i class="fas fa-check-circle"></i> Looks good!</small>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-dark" for="contactEmail">Email Address <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="fas fa-envelope text-primary"></i></span>
                                            <input class="form-control" type="email" name="email" id="contactEmail" placeholder="Enter your email" required />
                                        </div>
                                        <small class="text-danger d-none" id="emailError"><i class="fas fa-exclamation-circle"></i> Please enter a valid email</small>
                                        <small class="text-success d-none" id="emailSuccess"><i class="fas fa-check-circle"></i> Valid email!</small>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-dark" for="contactMobile">Mobile Number <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="fas fa-phone text-primary"></i></span>
                                            <input class="form-control" type="tel" name="mobile" id="contactMobile" placeholder="Enter 10-digit number" required />
                                        </div>
                                        <small class="text-danger d-none" id="mobileError"><i class="fas fa-exclamation-circle"></i> Please enter a valid 10-digit number</small>
                                        <small class="text-success d-none" id="mobileSuccess"><i class="fas fa-check-circle"></i> Valid number!</small>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-dark" for="contactCollege">College Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="fas fa-building text-primary"></i></span>
                                            <input class="form-control" type="text" name="college" id="contactCollege" placeholder="Enter college name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-dark" for="contactClass">Class / Semester</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="fas fa-graduation-cap text-primary"></i></span>
                                            <input class="form-control" type="text" name="class_semester" id="contactClass" placeholder="e.g. B.Tech 3rd Sem" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-bold text-dark" for="contactCity">City</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt text-primary"></i></span>
                                            <input class="form-control" type="text" name="city" id="contactCity" placeholder="Enter your city" />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <label class="form-label fw-bold text-dark" for="contactFeedback">Your Feedback</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light align-items-start pt-3"><i class="fas fa-comment-dots text-primary"></i></span>
                                            <textarea class="form-control" name="feedback" id="contactFeedback" rows="4" placeholder="Write your feedback here..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary btn-lg px-5 py-3 text-uppercase fw-bold" type="submit" id="submitBtn" style="border-radius: 50px; transition: all 0.3s;">
                                        <i class="fas fa-paper-plane me-2"></i> Submit Feedback
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer py-4 bg-dark text-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 text-center">
                    <p class="mb-2">&copy; 2026 Real Time Form Validation Project</p>
                    <small class="text-muted">Developed using HTML • CSS • Bootstrap • JavaScript • PHP • MySQL</small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        (function() {
            const nameInput = document.getElementById('contactName');
            const emailInput = document.getElementById('contactEmail');
            const mobileInput = document.getElementById('contactMobile');
            const form = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');

            function validateField(input, errorId, successId, condition) {
                const errorEl = document.getElementById(errorId);
                const successEl = document.getElementById(successId);
                
                if (input.value.trim() === '' && input.hasAttribute('required')) {
                    errorEl.classList.remove('d-none');
                    successEl.classList.add('d-none');
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                    return false;
                } else if (input.value.trim() !== '' && !condition) {
                    errorEl.classList.remove('d-none');
                    successEl.classList.add('d-none');
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                    return false;
                } else if (input.value.trim() === '' && !input.hasAttribute('required')) {
                    errorEl.classList.add('d-none');
                    successEl.classList.add('d-none');
                    input.classList.remove('is-invalid', 'is-valid');
                    return true;
                } else {
                    errorEl.classList.add('d-none');
                    successEl.classList.remove('d-none');
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                    return true;
                }
            }

            nameInput.addEventListener('input', function() {
                validateField(this, 'nameError', 'nameSuccess', this.value.trim().length >= 2);
            });

            emailInput.addEventListener('input', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                validateField(this, 'emailError', 'emailSuccess', emailRegex.test(this.value.trim()));
            });

            mobileInput.addEventListener('input', function() {
                const mobileRegex = /^[6-9]\d{9}$/;
                validateField(this, 'mobileError', 'mobileSuccess', mobileRegex.test(this.value.trim()));
            });

            form.addEventListener('submit', function(e) {
                let isValid = true;
                if (!validateField(nameInput, 'nameError', 'nameSuccess', nameInput.value.trim().length >= 2)) isValid = false;
                if (!validateField(emailInput, 'emailError', 'emailSuccess', /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value.trim()))) isValid = false;
                if (!validateField(mobileInput, 'mobileError', 'mobileSuccess', /^[6-9]\d{9}$/.test(mobileInput.value.trim()))) isValid = false;

                if (!isValid) {
                    e.preventDefault();
                    submitBtn.innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i> Fix Errors';
                    submitBtn.classList.add('btn-danger');
                    submitBtn.classList.remove('btn-primary');
                    
                    setTimeout(function() {
                        // Fixed: Restores text to "Submit Feedback" instead of "Submit Query"
                        submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i> Submit Feedback';
                        submitBtn.classList.remove('btn-danger');
                        submitBtn.classList.add('btn-primary');
                    }, 2000);
                } else {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Submitting...';
                    submitBtn.disabled = true;
                }
            });
        })();
    </script>
</body>
</html>