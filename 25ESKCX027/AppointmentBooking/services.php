<?php
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container my-5">

    <div class="text-center mb-5">
        <h2 class="text-primary fw-bold">Our Services</h2>
        <p class="text-muted">
            We provide a variety of healthcare services to make your appointment booking easy and convenient.
        </p>
    </div>

    <div class="row g-4">

        <!-- Service 1 -->
        <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <h4 class="text-primary">General Consultation</h4>
                    <p>
                        Book appointments with experienced doctors for routine health checkups and medical advice.
                    </p>
                </div>
            </div>
        </div>

        <!-- Service 2 -->
        <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <h4 class="text-primary">Dental Care</h4>
                    <p>
                        Schedule appointments for dental checkups, teeth cleaning, and oral health treatment.
                    </p>
                </div>
            </div>
        </div>

        <!-- Service 3 -->
        <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <h4 class="text-primary">Eye Care</h4>
                    <p>
                        Book eye examinations, vision testing, and consultations with eye specialists.
                    </p>
                </div>
            </div>
        </div>

        <!-- Service 4 -->
        <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <h4 class="text-primary">Skin Specialist</h4>
                    <p>
                        Consult experienced dermatologists for skin problems and cosmetic treatments.
                    </p>
                </div>
            </div>
        </div>

        <!-- Service 5 -->
        <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <h4 class="text-primary">Health Checkup</h4>
                    <p>
                        Get complete health checkup packages with online appointment scheduling.
                    </p>
                </div>
            </div>
        </div>

        <!-- Service 6 -->
        <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-body text-center">
                    <h4 class="text-primary">Emergency Consultation</h4>
                    <p>
                        Request urgent appointments for immediate medical consultation and assistance.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- Call to Action -->
    <div class="text-center mt-5">
        <a href="appointment.php" class="btn btn-primary btn-lg">
            Book an Appointment
        </a>
    </div>

</div>

<?php
include 'includes/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>