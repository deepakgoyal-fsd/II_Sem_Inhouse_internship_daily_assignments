<?php
$page = "contact";
include 'header.php';
?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow border-0">
            <div class="card-body p-5 text-center">
                <i class="fas fa-envelope-open-text fa-4x text-success mb-3"></i>
                <h2 class="card-title mb-4">Contact Us</h2>
                <p class="card-text fs-5">This page demonstrates the dynamic active navbar state using the include pattern. The navbar highlights "Contact" because the $page variable is set to "contact" before including the header.</p>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>