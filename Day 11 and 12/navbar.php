<?php
// auth.php already starts the session
$userName = $_SESSION['user_name'];
$userEmail = $_SESSION['user_email'];

$profileImage = "uploads/default.png";

if (isset($_SESSION['profile_picture']) && !empty($_SESSION['profile_picture'])) {
    $profileImage = "uploads/" . $_SESSION['profile_picture'];
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="dashboard.php">
            🎓 Student Management System
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarContent">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">

            <!-- Left Menu -->
            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="profile.php">
                        Profile
                    </a>
                </li>

            </ul>

            <!-- Right Side -->
            <ul class="navbar-nav align-items-center">

                <li class="nav-item me-3">

                    <img src="<?php echo $profileImage; ?>"
                         width="40"
                         height="40"
                         class="rounded-circle border border-light"
                         alt="Profile">

                </li>

                <li class="nav-item text-white me-3">

                    <strong>
                        <?php echo htmlspecialchars($userName); ?>
                    </strong>

                    <br>

                    <small>
                        <?php echo htmlspecialchars($userEmail); ?>
                    </small>

                </li>

                <li class="nav-item">

                    <a href="logout.php"
                       class="btn btn-danger btn-sm">

                        Logout

                    </a>

                </li>

            </ul>

        </div>

    </div>
</nav>