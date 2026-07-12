<?php
include 'db.php';

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $cgpa = $_POST['cgpa'];
    $status = $_POST['status'];

    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];

    if($photo=="")
    {
        $photo="default.png";
    }
    else
    {
        move_uploaded_file($temp,"uploads/".$photo);
    }

    $sql="INSERT INTO students(photo,name,email,branch,cgpa,status)
    VALUES('$photo','$name','$email','$branch','$cgpa','$status')";

    if(mysqli_query($conn,$sql))
    {
        header("Location: students.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Add New Student</h3>
</div>
<div class="card-body">
<form method="POST" enctype="multipart/form-data">
<div class="mb-3">
<label>Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Branch</label>

<select
name="branch"
class="form-select"
required>

<option value="">Select Branch</option>

<option>CSE</option>

<option>IT</option>

<option>Data Science</option>

<option>AI & ML</option>

</select>

</div>

<div class="mb-3">

<label>CGPA</label>

<input
type="number"
step="0.01"
min="0"
max="10"
name="cgpa"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-select">

<option>Active</option>

<option>Inactive</option>

</select>

</div>

<div class="mb-3">

<label>Profile Photo</label>

<input
type="file"
name="photo"
class="form-control">

</div>

<button
type="submit"
name="submit"
class="btn btn-success">

Add Student

</button>

<a
href="students.php"
class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</body>
</html>