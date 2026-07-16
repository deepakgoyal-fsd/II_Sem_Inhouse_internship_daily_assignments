<?php
session_start();

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

include("db_connect.php");
include("checkUpdateProfileError.php");
include("header.php");
include("dashboardVerticalContent.php");
?>

<div class="card p-4" style="max-width:500px;">
    <h3 class="mb-3">Update Profile</h3>

    <?php if (!empty($error)) { ?>
        <div class="alert <?php echo $error === 'Profile updated successfully!' ? 'alert-success' : 'alert-info'; ?>">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php } ?>

    <form action="" method="post">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control mb-3" placeholder="Name"
               value="<?php echo htmlspecialchars($name); ?>">

        <label class="form-label">Skills / Hobbies</label>
        <textarea name="hobbies" class="form-control mb-3" rows="3"
                  placeholder="e.g. reading, cricket, painting"><?php echo htmlspecialchars($skills); ?></textarea>

        <button class="btn btn-primary w-100">Update Profile</button>
    </form>
</div>

<?php
include("dashboardFooter.php");
include("footer.php");
?>