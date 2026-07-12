<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my website</title>
    

    <!-- bootstrap css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">

            <!-- logo -->
             <img src="https://www.vhv.rs/dpng/d/549-5499076_hd-logo-design-transparent-background-hd-png-download.png" alt="Logo" class="logo-img" style="width: 80px; height: 50px;">
                    <div class="logo">
                    <h1 class="m-0">My Website</h1>
                </div>
                <!-- navigation menu -->
                <nav>
                    <ul class="nav">
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    </ul>
                </nav>
              <!--  <a href="login.php"><button type="button" class="btn btn-primary">Log in </button></a>-->
            </div>
        </div>
    </header>
</body>
</html>

<!-- page content -->
<div class="container mt-5" style="max-width: 700px;">
    <div class="card shadow-sm p-4">
        <h3 class="mb-4 text-center">Our Services</h3>

        <div class="mb-3">
            <h5>Skill Profile</h5>
            <p class="text-muted mb-0">Create your own profile to showcase your skills, experience, and interests.</p>
        </div>

        <div class="mb-3">
            <h5>Connect with People</h5>
            <p class="text-muted mb-0">Find and connect with users who have similar skills or interests.</p>
        </div>

        <div class="mb-3">
            <h5>Chat</h5>
            <p class="text-muted mb-0">Communicate with other members to share ideas, ask questions, and help each other.</p>
        </div>

        <div class="mb-3">
            <h5>Project Collaboration</h5>
            <p class="text-muted mb-0">Work together on projects and gain practical experience through teamwork.</p>
        </div>

        <div class="mb-3">
            <h5>Knowledge Sharing</h5>
            <p class="text-muted mb-0">Learn from others and share your own knowledge with the community.</p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
