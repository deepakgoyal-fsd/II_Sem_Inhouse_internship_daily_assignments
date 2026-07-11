<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("db_connect.php");
include("dashboardHeader.php");
include("dashboardVerticalContent.php");
if (isset($_POST['updateProfile'])) {

    $name = $_POST['name'];

    $email = $_SESSION['user_email'];

    $filename = $_FILES['profile_picture']['name'];
    $tempname = $_FILES['profile_picture']['tmp_name'];

    if ($filename != "") {
        move_uploaded_file($tempname, "uploads/" . $filename);

        $query = "UPDATE user
                  SET name='$name',
                    profile_pic='$filename'
                  WHERE email='$email'";
    } else {
        $query = "UPDATE user
                  SET name='$name'
                  WHERE email='$email'";
    }

    if (mysqli_query($conn, $query)) {
        $_SESSION['user_name'] = $name;

        echo "<script>
                alert('Profile Updated Successfully');
                window.location='dashboard.php';
              </script>";
    }

}
?>

<form method="post" enctype="multipart/form-data">

    <div class="container mt-5" style="max-width:450px;">

        <h3 class="mb-3">Update Profile</h3>

        <input type="text" name="name" class="form-control mb-3" value="<?php echo $_SESSION['user_name']; ?>">

        <input type="file" name="profile_picture" class="form-control mb-3">

        <button type="submit" name="updateProfile" class="btn btn-primary w-100">

            Update Profile

        </button>

    </div>

</form>

<?php
include("dashboardFooter.php");
include("footer.php");
?>