<?php
session_start();

include("dashboardheader.php");
include("dashboardverticalcontent.php");
?>

<div class="container mt-5">

    <div class="card p-4">

        <h2 class="text-success">
            Profile Updated Successfully!
        </h2>

        <p>
            Your profile has been updated successfully.
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