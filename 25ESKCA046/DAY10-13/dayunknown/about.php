<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_name'])) {     
    include("dashboardHeader.php"); 
} else {     
    include("header.php"); 
}
?>

<div class="container mt-5 mb-5" style="max-width: 800px;">
    <div class="card shadow-sm border-0">
        <div class="card-body p-5 text-center">
            <h2 class="mb-4 text-primary">About Us</h2>
                         
            <p class="lead text-muted">
                We are dedicated to providing a seamless & good education for Students.
            </p>
            <hr class="my-4">
            <p class="text-secondary">
                Without us your future days are unknown.
            </p>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>