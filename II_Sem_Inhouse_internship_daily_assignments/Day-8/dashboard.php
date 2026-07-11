<?php
session_start();

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}

$username = $_SESSION["username"];
?>


<?php require "header.php"; ?>

<main>

    <div class="welcome-card">

        <h1>Welcome, <?php echo $username; ?> 🎉</h1>

        <p>You have successfully logged in.</p>

        <br>

        <div class="dashboard-buttons">

            <a href="add_details.php">
                <button>Add Details</button>
            </a>

            <a href="profile.php">
                <button>View Profile</button>
            </a>

            <a href="logout.php">
                <button>Logout</button>
            </a>

        </div>

    </div>

</main>

<?php require "footer.php"; ?>