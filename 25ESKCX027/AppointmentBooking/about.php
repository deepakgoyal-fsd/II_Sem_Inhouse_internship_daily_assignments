<?php
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- About Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">

            <!-- Image -->
            <div class="col-md-6 mb-4">
                <img src="images/about.jpeg" class="img-fluid rounded shadow" alt="About Us">
            </div>

            <!-- Content -->
            <div class="col-md-6">
                <h2 class="text-primary fw-bold mb-3">About Our Appointment Booking System</h2>

                <p class="text-muted">
                    Our Appointment Booking System is designed to make scheduling appointments
                    quick, easy, and convenient. Users can book appointments online without
                    waiting in long queues.
                </p>

                <p class="text-muted">
                    The system allows users to select services, choose their preferred date
                    and time, and submit appointment requests securely. It helps improve
                    efficiency and saves valuable time for both customers and administrators.
                </p>

                <h5 class="mt-4">Why Choose Us?</h5>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">✔ Easy Online Appointment Booking</li>
                    <li class="list-group-item">✔ User-Friendly Interface</li>
                    <li class="list-group-item">✔ Secure Data Management</li>
                    <li class="list-group-item">✔ Fast and Reliable Service</li>
                    <li class="list-group-item">✔ Responsive Design for All Devices</li>
                </ul>

                <a href="appointment.php" class="btn btn-primary mt-4">
                    Book Appointment
                </a>

            </div>

        </div>
    </div>
</section>

<?php
include 'includes/footer.php';
?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>