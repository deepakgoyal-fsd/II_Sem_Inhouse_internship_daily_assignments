<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Registration Form</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<div class="container-fluid min-vh-100 d-flex flex-column justify-content-center p-0">
    <div class="row g-0 min-vh-100">
        
        <!-- HERO SECTION -->
        <div class="col-lg-5 bg-primary text-white p-5 d-flex flex-column justify-content-center hero-section">
            <div class="px-md-4">
                <span class="badge bg-light text-primary mb-3 px-3 py-2 fw-semibold">Join Our Platform</span>
                <h1 class="display-4 fw-bold mb-3">Start your journey with us.</h1>
                <p class="lead mb-4 opacity-75">
                    Complete this quick multi-step process to set up your profile and get full access to our platform.
                </p>
                <ul class="list-unstyled d-grid gap-2">
                    <li class="d-flex align-items-center">
                        <span class="me-2">✓</span> Fast & secure setup
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="me-2">✓</span> Encryption-protected passwords
                    </li>
                    <li class="d-flex align-items-center">
                        <span class="me-2">✓</span> Customizable personal profile
                    </li>
                </ul>
            </div>
        </div>

        <!-- FORM SECTION -->
        <div class="col-lg-7 p-4 p-md-5 d-flex flex-column justify-content-center bg-white">
            <div class="mx-auto w-100" style="max-width: 600px;">
                
                <h2 class="fw-bold mb-4 text-dark">Register Account</h2>

                <!-- Step Progress Indicators -->
                <div class="d-flex justify-content-between mb-5 position-relative step-indicator">
                    <div class="step-line"></div>
                    <div class="step active" id="step-node-1">1</div>
                    <div class="step" id="step-node-2">2</div>
                    <div class="step" id="step-node-3">3</div>
                </div>

                <!-- Registration Form -->
                <form action="process.php" method="POST" id="multiStepForm">
                    
                    <!-- STEP 1: Account Info -->
                    <div class="form-step active-step" id="step-1">
                        <h5 class="mb-3 text-secondary">Step 1: Account Information</h5>
                        <div class="mb-3">
                            <label for="username" class="form-label fw-medium">Username</label>
                            <input type="text" class="form-control form-control-lg" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium">Email Address</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fw-medium">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" minlength="6" required>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-primary btn-lg px-4 next-btn">Next Step &rarr;</button>
                        </div>
                    </div>

                    <!-- STEP 2: Personal Details -->
                    <div class="form-step" id="step-2">
                        <h5 class="mb-3 text-secondary">Step 2: Personal Details</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fullName" class="form-label fw-medium">Full Name</label>
                                <input type="text" class="form-control form-control-lg" id="fullName" name="fullName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label fw-medium">Phone Number</label>
                                <input type="tel" class="form-control form-control-lg" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="dob" class="form-label fw-medium">Date of Birth</label>
                            <input type="date" class="form-control form-control-lg" id="dob" name="dob" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary btn-lg px-4 prev-btn">&larr; Previous</button>
                            <button type="button" class="btn btn-primary btn-lg px-4 next-btn">Next Step &rarr;</button>
                        </div>
                    </div>

                    <!-- STEP 3: Review & Terms -->
                    <div class="form-step" id="step-3">
                        <h5 class="mb-3 text-secondary">Step 3: Bio & Agreements</h5>
                        <div class="mb-3">
                            <label for="bio" class="form-label fw-medium">Short Bio (Optional)</label>
                            <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Tell us a bit about yourself..."></textarea>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                I accept the terms and conditions and privacy policy.
                            </label>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-secondary btn-lg px-4 prev-btn">&larr; Previous</button>
                            <button type="submit" class="btn btn-success btn-lg px-4">Create Account</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<script src="script.js"></script>
</body>
</html>