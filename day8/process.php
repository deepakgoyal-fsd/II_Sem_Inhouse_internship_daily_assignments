
<?php include "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

     
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- Header/Navbar -->
 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-3" href="#">Student Registration</a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="register.php">Home</a>
                </li>

            </ul>

            <a href="#" class="btn btn-primary ms-lg-3">
                Get Started
            </a>
        </div>

    </div>
</nav>
<main class="py-5"><div class="container">
<?php
 $name = $_POST['NAME'];
 $college = $_POST['COLLEGE'];
 $branch = $_POST['BRANCH'];
 $gender = $_POST['gridRadios'];

 $sql = "INSERT INTO students (name, college, branch, gender) VALUES ('$name', '$college', '$branch', '$gender')";

if (mysqli_query($conn, $sql)) {
    echo "<div class='alert alert-success'><strong>Success!</strong> Student Registered Successfully!</div>";
} else {
    echo "<div class='alert alert-danger'><strong>Error!</strong> " . mysqli_error($conn) . "</div>";
}

$result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
?>

<h3 class="mt-4">All Registered Students</h3>
<table class="table table-bordered table-striped table-hover mt-3">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>College</th>
            <th>Branch</th>
            <th>Gender</th>
            <th>Registered At</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['college']; ?></td>
            <td><?php echo $row['branch']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<div class="mt-3">
    <a href="register.php" class="btn btn-primary">Register Another Student</a>
</div>
</div></main>

<?php include 'footer.php'; ?>

   
    


    
</body>
</html>



