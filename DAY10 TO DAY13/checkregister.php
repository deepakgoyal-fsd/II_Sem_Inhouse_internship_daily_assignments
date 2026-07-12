<?php

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$course=$_POST['course'];
$address=$_POST['address'];

$errors=[];

if(!preg_match("/^[a-zA-Z ]+$/",$name))
{
$errors[]="Name should contain only letters.";
}

if(strlen($address)<10)
{
$errors[]="Address must be at least 10 characters.";
}

if(empty($gender))
{
$errors[]="Please select gender.";
}

if(count($errors)>0)
{
echo "<div style='width:500px;margin:auto;padding:20px;background:#ffe5e5;border:2px solid red;'>";

echo "<h2>Errors</h2>";

foreach($errors as $e)
{
echo "<p>$e</p>";
}

echo "<a href='index.php'>Go Back</a>";

echo "</div>";

exit();
}

$photo=$_FILES['photo']['name'];

move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/".$photo);

?>

<!DOCTYPE html>

<html>

<head>

<title>Registration Successful</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-success-subtle">

<div class="container mt-5">

<div class="card p-4 shadow">

<h2 class="text-success">
Registration Successful
</h2>

<hr>

<?php

if($photo!="")
{
echo "<img src='uploads/$photo' width='150' class='mb-3 rounded'>";
}

?>

<p><b>Name :</b> <?php echo $name; ?></p>

<p><b>Email :</b> <?php echo $email; ?></p>

<p><b>Gender :</b> <?php echo $gender; ?></p>

<p><b>Course :</b> <?php echo $course; ?></p>

<p><b>Address :</b> <?php echo $address; ?></p>

</div>

</div>

</body>

</html>