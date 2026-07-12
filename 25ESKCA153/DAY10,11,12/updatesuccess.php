<?php
session_start();
include("dashboardheader.php");

?>

<div class="container mt-5">
    <div class="card shadow p-4">

        <h2 class="text-success mb-3">
            Password Updated Successfully!
        </h2>

        <p>
            Your password has been changed successfully.
        </p>

        <a href="dashboard.php" class="btn btn-primary">
            Back to Dashboard
        </a>

    </div>
</div>

<?php
include("dashboardfooter.php");
include("footer.php");
?>