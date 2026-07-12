<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $course = htmlspecialchars($_POST["course"]);
    $address = htmlspecialchars($_POST["address"]);

    $photoName = "";

    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $photoName = $_FILES["photo"]["name"];
    }

} else {

    header("Location: index.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registration Successful</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow">

<div class="card-header bg-success text-white text-center">

<h2>Registration Successful</h2>

</div>

<div class="card-body">

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
<th>Phone Number</th>
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
<td><?php echo nl2br($address); ?></td>
</tr>

<tr>
<th>Uploaded Photo</th>
<td>
<?php
if ($photoName != "") {
    echo $photoName;
} else {
    echo "No Photo Uploaded";
}
?>
</td>
</tr>

</table>

<div class="text-center">

<a href="index.php" class="btn btn-primary">
Register Another Student
</a>

</div>

</div>

</div>

</div>

</div>

</div>

</body>

</html>