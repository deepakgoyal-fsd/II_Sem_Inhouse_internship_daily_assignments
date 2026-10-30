<?php
$page = "about";
include 'header.php';
?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow border-0">
            <div class="card-body p-5 text-center">
                <i class="fas fa-info-circle fa-4x text-primary mb-3"></i>
                <h2 class="card-title mb-4">About Us</h2>
                <p class="card-text fs-5">This page demonstrates the dynamic active navbar state using the include pattern. The navbar highlights "About" because the $page variable is set to "about" before including the header.</p>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>