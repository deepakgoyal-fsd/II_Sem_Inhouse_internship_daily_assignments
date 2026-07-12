<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg bg-success-subtle shadow">

<div class="container-fluid px-3">

    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="dashboard.php">

        <img src="Logo.jpeg"
             width="70"
             height="70"
             class="rounded-circle shadow me-2"
             alt="Logo">

        <div>
            <h5 class="mb-0 fw-bold text-success">
                Industrial Training
            </h5>
            <small class="text-muted">
                Management System
            </small>
        </div>

    </a>

    <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar">

        <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbar">

        <ul class="navbar-nav ms-auto align-items-center">

            <li class="nav-item mx-3">
                <a href="dashboard.php" class="nav-link fw-semibold">
                    Home
                </a>
            </li>

          
           <li class="nav-item ms-3">
    <a href="logout.php" class="btn btn-danger fw-bold">
        Logout
    </a>
</li>

        </ul>

    </div>

</div>

</nav>