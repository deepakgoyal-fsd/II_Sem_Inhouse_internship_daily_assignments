<?php
include "db.php";

$message = "";

/* ADD STUDENT */

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $cgpa = $_POST['cgpa'];
    $status = $_POST['status'];

    if (!empty($name) && !empty($email) && !empty($branch) && !empty($cgpa)) {

        $photo = $_FILES['photo']['name'];

        if (!empty($photo)) {
            move_uploaded_file(
                $_FILES['photo']['tmp_name'],
                "uploads/" . $photo
            );
        }

        $sql = "INSERT INTO students
                (name,email,branch,cgpa,status,photo)
                VALUES
                ('$name','$email','$branch','$cgpa','$status','$photo')";

        mysqli_query($conn, $sql);

        $message = "Student Added Successfully!";
    }
}


/* DELETE STUDENT */

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    mysqli_query(
        $conn,
        "DELETE FROM students WHERE id=$id"
    );

    $message = "Student Deleted Successfully!";
}


/* SEARCH */

$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}


/* BRANCH FILTER */

$branchFilter = "";

if (isset($_GET['branch'])) {
    $branchFilter = $_GET['branch'];
}


$sql = "SELECT * FROM students WHERE 1";

if ($search != "") {

    $sql .= " AND
    (name LIKE '%$search%'
    OR branch LIKE '%$search%')";
}

if ($branchFilter != "") {

    $sql .= " AND branch='$branchFilter'";
}

$result = mysqli_query($conn, $sql);

$total = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Student Management Portal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body class="bg-light">


<nav class="navbar navbar-dark bg-primary">

    <div class="container">

        <span class="navbar-brand">

            <i class="fa-solid fa-graduation-cap"></i>

            Student Management Portal

        </span>

    </div>

</nav>


<div class="container mt-4">


<?php if ($message != "") { ?>

<div class="alert alert-success">

    <?php echo $message; ?>

</div>

<?php } ?>


<!-- ADD STUDENT FORM -->

<div class="card shadow mb-4">

<div class="card-header bg-dark text-white">

    <h5>Add New Student</h5>

</div>

<div class="card-body">

<form method="POST"
      enctype="multipart/form-data">

<div class="row g-3">


<div class="col-md-6">

<input type="text"
       name="name"
       class="form-control"
       placeholder="Student Name"
       required>

</div>


<div class="col-md-6">

<input type="email"
       name="email"
       class="form-control"
       placeholder="Email"
       required>

</div>


<div class="col-md-4">

<select name="branch"
        class="form-select"
        required>

<option value="">Select Branch</option>

<option>CSE</option>

<option>IT</option>

<option>ECE</option>

<option>Mechanical</option>

<option>Civil</option>

</select>

</div>


<div class="col-md-4">

<input type="number"
       step="0.01"
       min="0"
       max="10"
       name="cgpa"
       class="form-control"
       placeholder="CGPA"
       required>

</div>


<div class="col-md-4">

<select name="status"
        class="form-select">

<option>Active</option>

<option>Inactive</option>

</select>

</div>


<div class="col-md-6">

<input type="file"
       name="photo"
       class="form-control">

</div>


<div class="col-md-6">

<button name="add"
        class="btn btn-primary w-100">

<i class="fa-solid fa-plus"></i>

Add Student

</button>

</div>


</div>

</form>

</div>

</div>


<!-- SEARCH -->

<div class="card shadow mb-4">

<div class="card-body">

<form method="GET">

<div class="row g-2">


<div class="col-md-5">

<input type="text"
       name="search"
       class="form-control"
       placeholder="Search by Name or Branch">

</div>


<div class="col-md-4">

<select name="branch"
        class="form-select">

<option value="">All Branches</option>

<option>CSE</option>

<option>IT</option>

<option>ECE</option>

<option>Mechanical</option>

<option>Civil</option>

</select>

</div>


<div class="col-md-3">

<button class="btn btn-success w-100">

<i class="fa-solid fa-search"></i>

Search

</button>

</div>


</div>

</form>

</div>

</div>


<!-- RECORD COUNT -->

<div class="alert alert-info">

<i class="fa-solid fa-users"></i>

<strong>Total Students: <?php echo $total; ?></strong>

</div>


<!-- STUDENT TABLE -->

<div class="table-responsive">

<table class="table table-bordered table-hover shadow">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Photo</th>

<th>Name</th>

<th>Email</th>

<th>Branch</th>

<th>CGPA</th>

<th>Status</th>

<th>Actions</th>

</tr>

</thead>


<tbody>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td><?php echo $row['id']; ?></td>


<td>

<?php if ($row['photo'] != "") { ?>

<img src="uploads/<?php echo $row['photo']; ?>"
     width="50"
     height="50"
     class="rounded-circle">

<?php } else { ?>

No Photo

<?php } ?>

</td>


<td><?php echo $row['name']; ?></td>


<td><?php echo $row['email']; ?></td>


<td><?php echo $row['branch']; ?></td>


<td><?php echo $row['cgpa']; ?></td>


<td>

<?php if ($row['status'] == "Active") { ?>

<span class="badge bg-success">

Active

</span>

<?php } else { ?>

<span class="badge bg-danger">

Inactive

</span>

<?php } ?>

</td>


<td>

<a href="edit.php?id=<?php echo $row['id']; ?>"
   class="btn btn-warning btn-sm">

<i class="fa-solid fa-pen"></i>

Edit

</a>


<a href="index.php?delete=<?php echo $row['id']; ?>"
   class="btn btn-danger btn-sm"
   onclick="return confirm('Are you sure you want to delete this student?')">

<i class="fa-solid fa-trash"></i>

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>


</div>


</body>

</html>