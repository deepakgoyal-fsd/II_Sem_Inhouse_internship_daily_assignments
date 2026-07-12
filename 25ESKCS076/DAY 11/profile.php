<?php
include("db_connect.php");
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location:index.php");
    exit();
}

$id = $_SESSION['user_id'];
$message = "";

if(isset($_POST['upload']))
{
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];

    if($filename!="")
    {
        move_uploaded_file($tempname,"uploads/".$filename);

        mysqli_query($conn,"UPDATE user SET profile_image='$filename' WHERE id='$id'");

        $_SESSION['profile_image']=$filename;

        $message = "Profile Picture Updated Successfully!";
    }
}

$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE id='$id'"));
?>

<!DOCTYPE html>
<html>

<head>

<title>Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:500px;">

<div class="card shadow p-4">

<h2 class="text-center">My Profile</h2>

<?php
if($message!="")
{
    echo "<div class='alert alert-success'>$message</div>";
}
?>

<div class="text-center mb-3">

<?php
if($user['profile_image']!="" && file_exists("uploads/".$user['profile_image']))
{
?>
<img src="uploads/<?php echo $user['profile_image']; ?>"
width="150"
height="150"
class="rounded-circle border">
<?php
}
else
{
?>
<img src="https://via.placeholder.com/150"
class="rounded-circle">
<?php
}
?>

</div>

<h5>Name : <?php echo $user['name']; ?></h5>

<h5>Email : <?php echo $user['email']; ?></h5>

<hr>

<form method="POST" enctype="multipart/form-data">

<label>Select Profile Picture</label>

<input
type="file"
name="image"
class="form-control mb-3"
required>

<button
type="submit"
name="upload"
class="btn btn-success w-100">
Upload Picture
</button>

</form>

<br>

<a href="dashboard.php" class="btn btn-primary w-100">
Back to Dashboard
</a>

</div>

</div>

</body>

</html>
