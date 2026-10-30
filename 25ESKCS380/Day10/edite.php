<?php

include "db.php";

$id = $_GET['id'];

$result = mysqli_query(
    $conn,
    "SELECT * FROM students WHERE id=$id"
);

$student = mysqli_fetch_assoc($result);

$message = "";


if (isset($_POST['update'])) {

    $name = $_POST['name'];

    $email = $_POST['email'];

    $branch = $_POST['branch'];

    $cgpa = $_POST['cgpa'];

    $status = $_POST['status'];


    mysqli_query(
        $conn,
        "UPDATE students SET

        name='$name',

        email='$email',

        branch='$branch',

        cgpa='$cgpa',

        status='$status'

        WHERE id=$id"
    );


    $message = "Student Updated Successfully!";


    $result = mysqli_query(
        $conn,
        "SELECT * FROM students WHERE id=$id"
    );

    $student = mysqli_fetch_assoc($result);

}

?>


<!DOCTYPE html>

<html>

<head>

<title>Edit Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

</head>


<body class="bg-light">


<div class="container mt-5">


<div class="card shadow">


<div class="card-header bg-warning">

<h4>Edit Student</h4>

</div>


<div class="card-body">


<?php if ($message != "") { ?>

<div class="alert alert-success">

<?php echo $message; ?>

</div>

<?php } ?>


<form method="POST">


<div class="mb-3">

<label>Name</label>

<input type="text"
       name="name"
       class="form-control"
       value="<?php echo $student['name']; ?>"
       required>

</div>


<div class="mb-3">

<label>Email</label>

<input type="email"
       name="email"
       class="form-control"
       value="<?php echo $student['email']; ?>"
       required>

</div>


<div class="mb-3">

<label>Branch</label>

<select name="branch"
        class="form-select">

<option <?php if($student['branch']=="CSE") echo "selected"; ?>>
CSE
</option>

<option <?php if($student['branch']=="IT") echo "selected"; ?>>
IT
</option>

<option <?php if($student['branch']=="ECE") echo "selected"; ?>>
ECE
</option>

<option <?php if($student['branch']=="Mechanical") echo "selected"; ?>>
Mechanical
</option>

<option <?php if($student['branch']=="Civil") echo "selected"; ?>>
Civil
</option>

</select>

</div>


<div class="mb-3">

<label>CGPA</label>

<input type="number"
       step="0.01"
       name="cgpa"
       class="form-control"
       value="<?php echo $student['cgpa']; ?>"
       required>

</div>


<div class="mb-3">

<label>Status</label>

<select name="status"
        class="form-select">

<option
<?php if($student['status']=="Active") echo "selected"; ?>>

Active

</option>

<option
<?php if($student['status']=="Inactive") echo "selected"; ?>>

Inactive

</option>

</select>

</div>


<button name="update"
        class="btn btn-success">

Update Student

</button>


<a href="index.php"
   class="btn btn-secondary">

Back

</a>


</form>


</div>

</div>

</div>

</body>

</html>