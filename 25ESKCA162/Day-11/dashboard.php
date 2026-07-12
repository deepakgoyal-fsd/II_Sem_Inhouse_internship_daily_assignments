<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("dashboardheader.php");
?>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h3 class="text-success">
                Welcome,
                <?php echo htmlspecialchars($_SESSION['user_name']); ?>!
            </h3>

            

    

        </div>

    </div>

</div>

<?php include("footer.php"); ?>