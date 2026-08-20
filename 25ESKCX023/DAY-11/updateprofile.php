<?php
include("header.php");
include("db_connect.php");

$id = $_GET['id'];

$query = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<div class="container mt-5" style="max-width:500px;">
    <form action="checkupdateprofile.php" method="post">

        <h3 class="mb-3">Update Profile</h3>

        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <input type="text" class="form-control mb-3"
            name="name"
            value="<?php echo $user['name']; ?>">

        <input type="email" class="form-control mb-3"
            name="email"
            value="<?php echo $user['email']; ?>">

        <button class="btn btn-primary w-100">
            Update
        </button>

    </form>
</div>

<?php
include("footer.php");
?>