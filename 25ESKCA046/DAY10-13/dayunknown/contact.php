<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_name'])) {
    include("dashboardHeader.php"); 
} else {
    include("header.php"); 
}

$message = ""; 
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"] ?? ""));
    $email = htmlspecialchars(trim($_POST["email"] ?? ""));
    $msg = htmlspecialchars(trim($_POST["message"] ?? ""));
    
    if (empty($name) || empty($email) || empty($msg)) {
        $error = "<div class='alert alert-danger text-center alert-dismissible fade show'>All fields are required.</div>";
    } else {
        $message = "<div class='alert alert-success text-center alert-dismissible fade show'>Thank you, $name! We will get back to you soon.</div>"; 
    }
}
?>

<div class="container mt-5 mb-5" style="max-width: 600px;">
         
    <?php if ($message != "") echo $message; ?>
    <?php if ($error != "") echo $error; ?>
         
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h3 class="mb-4 text-center text-primary">Contact Us</h3>
                         
            <form action="contact.php" method="POST">
                <div class="mb-3">
                    <label class="form-label text-muted">Your Name</label>
                    <input type="text" name="name" class="form-control bg-light" placeholder="Enter your full name" required>
                </div>
                                 
                <div class="mb-3">
                    <label class="form-label text-muted">Email Address</label>
                    <input type="email" name="email" class="form-control bg-light" placeholder="name@example.com" required>
                </div>
                                 
                <div class="mb-4">
                    <label class="form-label text-muted">Your Message</label>
                    <textarea name="message" class="form-control bg-light" rows="4" placeholder="How can we help you?" required></textarea>
                </div>
                                 
                <button type="submit" class="btn btn-primary w-100 btn-lg">Send Message</button>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>