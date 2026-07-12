<?php
session_start();
include("db_connect1.php");

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user_email'];

// Fetch User Details
$selectQuery = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $selectQuery);
$user = mysqli_fetch_assoc($result);

// Update Profile
if (isset($_POST['update'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);

    // Existing profile picture
    $profile_pic = $user['profile_pic'];

    // Upload new profile picture
    if (!empty($_FILES['profile_pic']['name'])) {

        $profile_pic = time() . "_" . $_FILES['profile_pic']['name'];

        move_uploaded_file(
            $_FILES['profile_pic']['tmp_name'],
            "uploads/" . $profile_pic
        );
    }

    // Update Query
    $updateQuery = "UPDATE user SET
                    name='$name',
                    skills='$skills',
                    profile_pic='$profile_pic'
                    WHERE email='$email'";

    if (mysqli_query($conn, $updateQuery)) {

        $_SESSION['user_name'] = $name;

        echo "<script>
                alert('Profile Updated Successfully');
                window.location='UpdateProfile.php';
              </script>";
        exit();

    } else {
        echo "<script>alert('Profile Not Updated');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Update Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h2>Update Profile</h2>
</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label class="form-label">Name</label>
<input type="text"
       name="name"
       class="form-control"
       value="<?php echo $user['name']; ?>"
       required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email"
       class="form-control"
       value="<?php echo $user['email']; ?>"
       readonly>
</div>

<div class="mb-3">
<label class="form-label">Skills</label>
<input type="text"
       name="skills"
       class="form-control"
       value="<?php echo $user['skills']; ?>">
</div>

<div class="mb-3">
<label class="form-label">Profile Picture</label>
<input type="file"
       name="profile_pic"
       class="form-control">
</div>

<?php
if (!empty($user['profile_pic'])) {
?>
<div class="mb-3">
<img src="uploads/<?php echo $user['profile_pic']; ?>"
     width="120"
     height="120"
     class="rounded-circle border">
</div>
<?php
}
?>

<button type="submit"
        name="update"
        class="btn btn-success">
Update Profile
</button>

<a href="dashboard.php"
   class="btn btn-secondary">
Back
</a>

</form>

</div>

</div>

</div>

</body>
</html>