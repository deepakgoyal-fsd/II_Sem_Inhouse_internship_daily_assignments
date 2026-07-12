<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portfolio Builder</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3 text-success" href="#">
            PortfolioBuilder
        </a>
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
           <div class="navbar-nav ms-auto me-4">
               <a class="nav-link active" href="#home">Home</a>
               <a class="nav-link" href="#features">Features</a>
               <a class="nav-link" href="#contact">Contact</a>
               <a class="nav-link" href="#how-it-works">How It Works</a> 
            </div>
            <div class="d-flex gap-2">
                <a href="login.php" class="btn btn-outline-success me-2 px-4">
                    Login
                </a>
                <a href="register.php" class="btn btn-success px-4">
                    Get Started
                </a>
            </div>
        </div>
    </div>
</nav>
<section id="home" class="hero py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold text-dark">
                    Build Your
                    <span class="text-success">
                        Professional
                    </span>
                    Student Portfolio
                </h1>
                <p class="lead text-secondary mt-3">
                    Showcase your skills, projects, certifications,
                    and achievements with a beautiful online portfolio
                    that helps you stand out.
                </p>
                <div class="mt-4">
                    <a href="register.php"
                       class="btn btn-success btn-lg px-4 me-2">
                        Create Portfolio
                    </a>
                    <a href="login.php"
                       class="btn btn-outline-success btn-lg px-4">
                        Login
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <img src="hero.jpeg" class="img-fluid" alt="Student creating portfolio">
            </div>
        </div>
    </div>
</section>
<section class="why-us py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Why Choose Our Portfolio Builder?
            </h2>
            <p class="text-secondary">
                Create a professional portfolio without any coding knowledge.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card h-100 text-center p-4 border-0 shadow-sm">
                    <h4>
                        Easy To Create
                    </h4>
                    <p class="text-secondary">
                        Build your portfolio quickly with a simple
                        and user-friendly interface.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 text-center p-4 border-0 shadow-sm">
                    <h4>
                        Professional Design
                    </h4>
                    <p class="text-secondary">
                        Showcase your skills and achievements
                        with modern portfolio templates.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 text-center p-4 border-0 shadow-sm">
                    <h4>
                        Share Anywhere
                    </h4>
                    <p class="text-secondary">
                        Generate your portfolio link and share
                        it with recruiters and friends.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="how-it-works" class="how-it-works py-5">
<div class="container">
<div class="text-center mb-5">
<h2 class="fw-bold">
How It Works
</h2>
</div>
<div class="row text-center g-4">
<div class="col-lg-4">
<h3>
1
</h3>
<h5>
Create Account
</h5>
<p>
Register and create your student profile.
</p>
</div>
<div class="col-lg-4">
<h3>
2
</h3>
<h5>
Customize Portfolio
</h5>
<p>
Add your skills, projects and achievements.
</p>
</div>
<div class="col-lg-4">
<h3>
3
</h3>
<h5>
Share & Grow
</h5>
<p>
Share your portfolio link with recruiters.
</p>
</div>
</div>
</div>
</section>
<section id="features" class="features py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Powerful Features
            </h2>
            <p class="text-secondary">
                Everything students need to build their digital identity.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <h5 class="fw-bold">
                    User Profile
                </h5>
                <p>
                    Add personal details, education,
                    skills and achievements.
                </p>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="fw-bold">
                    Project Showcase
                </h5>
                <p>
                    Display your projects with descriptions
                    and links.
                </p>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="fw-bold">
                    Multiple Themes
                </h5>
                <p>
                    Customize your portfolio appearance.
                </p>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="fw-bold">
                    PDF Export
                </h5>
                <p>
                    Download your portfolio as a PDF.
                </p>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="fw-bold">
                    Auto Save
                </h5>
                <p>
                    Save your changes and update anytime.
                </p>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5 class="fw-bold">
                    Portfolio Link
                </h5>
                <p>
                    Share your portfolio through a unique URL.
                </p>
</div>
        </div>
  </div>
</section>
<section id="contact" class="contact py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Contact Us
            </h2>
            <p class="text-secondary">
                Have questions? We would love to hear from you.
            </p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form>
                    <div class="mb-3">
                        <input type="text" 
                               class="form-control"
                               placeholder="Your Name">
                    </div>
                    <div class="mb-3">
                        <input type="email"
                               class="form-control"
                               placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control"
                                  rows="4"
                                  placeholder="Your Message"></textarea>
                    </div>
                    <button class="btn btn-success px-4">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-success text-white text-center">
<div class="container">
<h2 class="fw-bold">
Ready To Build Your Portfolio?
</h2>
<p>
Create your professional student portfolio today.
</p>
<a href="register.php" class="btn btn-light px-4 mt-3">
Get Started
</a>
</div>
</section>
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start">
                <h4 class="fw-bold text-success">
                    PortfolioBuilder
                </h4>
                <p class="text-muted mb-0">
                    Build your professional student portfolio with ease.
                </p>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <p class="mb-0 text-muted">
                © 2026 PortfolioBuilder. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>