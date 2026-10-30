<?php
include 'includes/config.php';

if(isset($_POST['book']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $message = $_POST['message'];

    $sql = "INSERT INTO appointments
    (name,email,phone,service,appointment_date,appointment_time,message)
    VALUES
    ('$name','$email','$phone','$service','$date','$time','$message')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Appointment Booked Successfully!');</script>";
    }
    else
    {
        echo "<script>alert('Something went wrong!');</script>";
    }
}

include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Book Appointment</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container mt-5 mb-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow">

<div class="card-header bg-primary text-white text-center">
<h2>Book Your Appointment</h2>
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Phone Number</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Select Service</label>

<select name="service" class="form-select" required>

<option value="">Choose Service</option>

<option>General Consultation</option>

<option>Dental Checkup</option>

<option>Eye Checkup</option>

<option>Skin Specialist</option>

<option>Health Checkup</option>

</select>

</div>

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Appointment Date</label>
<input type="date" name="date" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Appointment Time</label>
<input type="time" name="time" class="form-control" required>
</div>

</div>

<div class="mb-3">
<label class="form-label">Message</label>
<textarea name="message" rows="4" class="form-control" placeholder="Write your message..."></textarea>
</div>

<div class="text-center">

<button type="submit" name="book" class="btn btn-primary btn-lg">
Book Appointment
</button>

<button type="reset" class="btn btn-secondary btn-lg">
Reset
</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

<?php
include 'includes/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>