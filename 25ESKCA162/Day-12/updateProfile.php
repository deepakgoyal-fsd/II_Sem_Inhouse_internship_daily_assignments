<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("db-connect.php");
include("header.php");
include("dashboardheader.php");

$id = $_SESSION['user_id'];
$message = "";

// Fetch current user data
$result = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
$user = mysqli_fetch_assoc($result);

$name = $user['name'];
$email = $user['email'];

// Update profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    // Check if email already exists for another user
    $check = mysqli_query($conn, "SELECT id FROM user WHERE email='$email' AND id!='$id'");

    if (mysqli_num_rows($check) > 0) {

        $message = "<div class='alert alert-danger'>Email already exists.</div>";

    } else {

        $sql = "UPDATE user SET name='$name', email='$email' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {

            $_SESSION['user_name'] = $name;
            $message = "<div class='alert alert-success'>Profile updated successfully.</div>";

        } else {

            $message = "<div class='alert alert-danger'>Update failed.</div>";

        }
    }
}
?>

<div class="container mt-5" style="max-width:400px;">

    <?= $message; ?>

    <form method="POST">

        <h3 class="mb-3">Update Profile</h3>

        <input
            type="text"
            name="name"
            class="form-control mb-3"
            value="<?= htmlspecialchars($name); ?>"
            placeholder="Name"
            required>

        <input
            type="email"
            name="email"
            class="form-control mb-3"
            value="<?= htmlspecialchars($email); ?>"
            placeholder="Email"
            required>

        <button type="submit" class="btn btn-primary w-100">
            Update Profile
        </button>

    </form>

</div>

<?php include("footer.php"); ?>