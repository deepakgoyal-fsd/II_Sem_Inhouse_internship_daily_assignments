<?php
include("session.php");
include("db_connect.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    $image = $row['image'];

    if($_FILES['image']['name'] != ""){

        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp,"uploads/".$image);
    }

    $update = "UPDATE users SET
                name='$name',
                email='$email',
                image='$image'
                WHERE id='$id'";

    if(mysqli_query($conn,$update)){
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit User</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow mx-auto" style="max-width:500px;">

<div class="card-body">

<h2 class="mb-4">Edit User</h2>

<form method="POST" enctype="multipart/form-data">

<label>Name</label>

<input
type="text"
name="name"
class="form-control mb-3"
value="<?php echo $row['name']; ?>"
required>

<label>Email</label>

<input
type="email"
name="email"
class="form-control mb-3"
value="<?php echo $row['email']; ?>"
required>

<label>Current Image</label>

<br>

<img
src="uploads/<?php echo $row['image']; ?>"
width="100"
class="mb-3">

<input
type="file"
name="image"
class="form-control mb-3">

<input
type="submit"
name="update"
value="Update"
class="btn btn-success">

<a href="dashboard.php" class="btn btn-secondary">
Back
</a>

</form>

</div>

</div>

</div>

</body>

</html>
