<?php
include("header.php");
include("checkupdateError1.php");
?>

<div class="container mt-5" style="max-width:400px;">
    <h2 class="text-center mb-4">Update Profile</h2>

    <form method="post">
        <input type="text"
               name="name"
               class="form-control mb-3"
               placeholder="Enter New Name">

        <button type="submit"
                class="btn btn-primary w-100">
            Update Profile
        </button>
    </form>

    <?php
    if($error!="")
    {
        echo "<p class='text-danger mt-3'>$error</p>";
    }
    ?>
</div>

<?php
include("footer.php");
?>