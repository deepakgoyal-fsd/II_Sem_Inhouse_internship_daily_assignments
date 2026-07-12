<?php
include("db-connect.php");

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM user WHERE id='$user_id'";
$result = mysqli_query($conn, $query);

$user = mysqli_fetch_assoc($result);
if (!isset($_SESSION['user_name'])) {
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success-subtle shadow px-4 py-2">
        <?php
        if (!empty($user["profile_pic"])) {
        ?>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($user["profile_pic"]); ?>"
                height="60"
                width="60"
                class="rounded-circle border border-dark">
        <?php
        } else {
        ?>
            <img src="logo.png"
                height="60"
                width="60"
                class="rounded-circle border border-dark">
        <?php
        }
        ?>
        </h4>
        <div class="d-flex ms-auto">
            <a href="" class="nav-link text-dark mx-5 fw-semibold">Home</a>
            <a href="" class="nav-link text-dark mx-5 fw-semibold">About</a>
            <a href="" class="nav-link text-dark mx-5 fw-semibold">Contact Us</a>
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </nav>
</body>

</html>