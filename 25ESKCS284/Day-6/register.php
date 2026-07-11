<?php

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$mobile = trim($_POST['mobile']);
$gender = $_POST['gender'] ?? "";
$course = $_POST['course'];
$address = trim($_POST['address']);

$errors = [];

if(empty($name))
{
    $errors[] = "Name is required.";
}
elseif(!preg_match("/^[a-zA-Z ]+$/",$name))
{
    $errors[] = "Name cannot contain numbers.";
}

if(empty($email))
{
    $errors[] = "Email is required.";
}

if(empty($mobile))
{
    $errors[] = "Mobile is required.";
}

if(empty($gender))
{
    $errors[] = "Select Gender.";
}

if(empty($course))
{
    $errors[] = "Select Course.";
}

if(strlen($address)<10)
{
    $errors[] = "Address must be at least 10 characters.";
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Registration Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card p-4 shadow">

<?php

if(count($errors)>0)
{

echo "<div class='alert alert-danger'>";

foreach($errors as $error)
{
    echo "$error <br>";
}

echo "</div>";

echo "<a href='index.php' class='btn btn-danger'>Go Back</a>";

}

else
{

?>

<h2 class="text-success">Registration Successful</h2>

<hr>

<p><b>Name :</b> <?php echo $name; ?></p>

<p><b>Email :</b> <?php echo $email; ?></p>

<p><b>Mobile :</b> <?php echo $mobile; ?></p>

<p><b>Gender :</b> <?php echo $gender; ?></p>

<p><b>Course :</b> <?php echo $course; ?></p>

<p><b>Address :</b> <?php echo $address; ?></p>

<p><b>Photo :</b> UI Only (Not Uploaded)</p>

<a href="index.php" class="btn btn-primary">Register Another Student</a>

<?php

}

?>

</div>

</div>

</body>

</html>