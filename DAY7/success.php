<?php

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$gender = $_GET['gender'];
$course = $_GET['course'];
$address = $_GET['address'];
$photo = $_GET['photo'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Successful</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="text-center text-success">
            Registration Successful 🎉
        </h2>

        <hr>

        <?php
        if($photo!=""){
        ?>
            <div class="text-center">
                <img src="uploads/<?php echo $photo; ?>" width="180" height="180">
            </div>
            <br>
        <?php
        }
        ?>

        <table class="table table-bordered">

            <tr>
                <th>Full Name</th>
                <td><?php echo $name; ?></td>
            </tr>

            <tr>
                <th>Email</th>
                <td><?php echo $email; ?></td>
            </tr>

            <tr>
                <th>Phone</th>
                <td><?php echo $phone; ?></td>
            </tr>

            <tr>
                <th>Gender</th>
                <td><?php echo $gender; ?></td>
            </tr>

            <tr>
                <th>Course</th>
                <td><?php echo $course; ?></td>
            </tr>

            <tr>
                <th>Address</th>
                <td><?php echo $address; ?></td>
            </tr>

        </table>

        <a href="index.php" class="btn btn-primary w-100">
            Register Another Student
        </a>

    </div>

</div>

</body>
</html>