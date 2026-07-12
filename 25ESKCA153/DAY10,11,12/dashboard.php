<?php
session_start();
include("dashboardheader.php");

?>
<div class="container mt-5">

    <div class="card shadow rounded-4">

        <div class="card-body text-center">

            <h2 class="fw-bold">
                Welcome, <?php echo $_SESSION['user_name']; ?> 👋
            </h2>

            <p class="text-muted">
                You have successfully logged in to your account.
            </p>

        </div>

    </div>

</div>
<?php
include("dashboardverticalcontent.php");
include("footer.php");
?>