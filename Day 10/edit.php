<?php
include 'db.php';

if(!isset($_GET['id']))
{
    header("Location: students.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM students WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $cgpa = $_POST['cgpa'];
    $status = $_POST['status'];

    $photo = $row['photo'];

    if(!empty($_FILES['photo']['name']))
    {
        $photo = $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/".$photo);
    }

    $sql = "UPDATE students SET
            photo='$photo',
            name='$name',
            email='$email',
            branch='$branch',
            cgpa='$cgpa',
            status='$status'
            WHERE id='$id'";

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

<title>Edit Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">

<h3>Edit Student</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="text-center mb-3">

<img src="uploads/<?php echo $row['photo']; ?>"
width="120"
height="120"
class="rounded-circle border">

</div>

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
value="<?php echo $row['name']; ?>"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?php echo $row['email']; ?>"
required>

</div>

<div class="mb-3">

<label>Branch</label>

<select
name="branch"
class="form-select">

<option <?php if($row['branch']=="CSE") echo "selected"; ?>>CSE</option>

<option <?php if($row['branch']=="IT") echo "selected"; ?>>IT</option>

<option <?php if($row['branch']=="Data Science") echo "selected"; ?>>Data Science</option>

<option <?php if($row['branch']=="AI & ML") echo "selected"; ?>>AI & ML</option>

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
value="<?php echo $row['cgpa']; ?>"
required>

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-select">

<option value="Active"
<?php if($row['status']=="Active") echo "selected"; ?>>
Active
</option>

<option value="Inactive"
<?php if($row['status']=="Inactive") echo "selected"; ?>>
Inactive
</option>

</select>

</div>

<div class="mb-3">

<label>Change Profile Photo</label>

<input
type="file"
name="photo"
class="form-control">

</div>

<button
type="submit"
name="update"
class="btn btn-warning">

Update Student

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