<?php
include 'includes/config.php';

if(isset($_POST['send']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contacts(name,email,subject,message)
            VALUES('$name','$email','$subject','$message')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Your message has been sent successfully!');</script>";
    }
    else
    {
        echo "<script>alert('Error! Please try again.');</script>";
    }
}

include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Us</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container my-5">

    <div class="text-center mb-4">
        <h2 class="text-primary">Contact Us</h2>
        <p class="text-muted">We'd love to hear from you. Send us your queries.</p>
    </div>

    <div class="row">

        <!-- Contact Form -->
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea name="message" rows="5" class="form-control" required></textarea>
                        </div>

                        <button type="submit" name="send" class="btn btn-primary">
                            Send Message
                        </button>

                    </form>

                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">

                    <h4 class="text-primary">Contact Information</h4>
                    <hr>

                    <p><strong>📍 Address:</strong><br>
                    ABC Hospital, Jaipur, Rajasthan</p>

                    <p><strong>📞 Phone:</strong><br>
                    +91 9876543210</p>

                    <p><strong>✉ Email:</strong><br>
                    info@appointment.com</p>

                    <p><strong>🕒 Working Hours:</strong><br>
                    Monday - Saturday<br>
                    9:00 AM - 6:00 PM</p>

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