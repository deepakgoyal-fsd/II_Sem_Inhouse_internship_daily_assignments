<!-- =========================================================
     NAVBAR SECTION
     A simple responsive Bootstrap navbar with a Dark/Light
     mode toggle switch on the right side.
========================================================= -->
<nav class="navbar navbar-expand-lg sticky-top navbar-custom">
    <div class="container">

        <!-- Project Title / Logo -->
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="bi bi-clock-history"></i> Time Zone Converter
        </a>

        <!-- Hamburger button for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible links -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#converter">Converter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#currentTime">Current Time</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#history">History</a>
                </li>

                <!-- Dark Mode / Light Mode Toggle -->
                <li class="nav-item d-flex align-items-center ms-lg-3 mt-2 mt-lg-0 justify-content-center">
                    <i class="bi bi-sun-fill me-2"></i>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="themeToggle">
                    </div>
                    <i class="bi bi-moon-fill ms-2"></i>
                </li>
            </ul>
        </div>
    </div>
</nav>
