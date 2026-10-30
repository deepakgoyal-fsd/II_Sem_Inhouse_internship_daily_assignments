<?php
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<!-- Hero Section -->
<section class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Welcome to Appointment Booking System</h1>
        <p class="lead mt-3">
            Book your appointments quickly and easily with our online appointment booking system.
        </p>

        <a href="appointment.php" class="btn btn-light btn-lg mt-3">
            Book Appointment
        </a>
    </div>
</section>

<!-- About -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="text-primary mb-4">About Us</h2>

        <p class="text-muted">
            Our Appointment Booking System helps users schedule appointments online
            without waiting in long queues. It provides a fast, secure, and
            user-friendly experience for both customers and administrators.
        </p>
    </div>
</section>

<!-- Services -->
<section class="bg-light py-5">
    <div class="container">

        <h2 class="text-center text-primary mb-5">Our Services</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h4>General Consultation</h4>
                        <p>Book appointments for general health consultation.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h4>Dental Checkup</h4>
                        <p>Schedule appointments with experienced dentists.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h4>Eye Checkup</h4>
                        <p>Book appointments for eye examination and treatment.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5">
    <div class="container">

        <h2 class="text-center text-primary mb-4">Why Choose Us?</h2>

        <div class="row text-center">

            <div class="col-md-3">
                <h4>✔ Easy Booking</h4>
                <p>Book appointments anytime from anywhere.</p>
            </div>

            <div class="col-md-3">
                <h4>✔ Secure</h4>
                <p>Your information is stored securely.</p>
            </div>

            <div class="col-md-3">
                <h4>✔ Fast Service</h4>
                <p>Save time by booking online.</p>
            </div>

            <div class="col-md-3">
                <h4>✔ Trusted</h4>
                <p>Reliable and user-friendly appointment management.</p>
            </div>

        </div>

    </div>
</section>

<!-- Call to Action -->
<section class="bg-primary text-white text-center py-5">
    <div class="container">

        <h2>Ready to Book Your Appointment?</h2>

        <p class="mt-3">
            Click the button below and schedule your appointment today.
        </p>

        <a href="appointment.php" class="btn btn-light btn-lg">
            Book Now
        </a>

    </div>
</section>

<?php
include 'includes/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>