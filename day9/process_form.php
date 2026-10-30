<?php

include("db_connect.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name=mysqli_real_escape_string($conn,$_POST['name']);
$roll=mysqli_real_escape_string($conn,$_POST['roll']);
$branch=mysqli_real_escape_string($conn,$_POST['branch']);
$cgpa=mysqli_real_escape_string($conn,$_POST['cgpa']);
$course=mysqli_real_escape_string($conn,$_POST['course']);
$address=mysqli_real_escape_string($conn,$_POST['address']);

$photo="";

if($_FILES['photo']['name']!=""){

$photo=$_FILES['photo']['name'];

move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/".$photo);

}

$sql="INSERT INTO student(full_name,roll_no,branch,cgpa,photo,address,course)
VALUES('$name','$roll','$branch','$cgpa','$photo','$address','$course')";

if(mysqli_query($conn,$sql)){
?>

<!DOCTYPE html>

<html>

<head>

<title>Registration Successful</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h2>Registration Successful</h2>

</div>

<div class="card-body">

<?php if($photo!=""){ ?>

<img src="uploads/<?php echo $photo; ?>" width="150" class="mb-3">

<?php } ?>

<p><strong>Name:</strong> <?php echo $name; ?></p>

<p><strong>Roll No:</strong> <?php echo $roll; ?></p>

<p><strong>Branch:</strong> <?php echo $branch; ?></p>

<p><strong>CGPA:</strong> <?php echo $cgpa; ?></p>

<p><strong>Course:</strong> <?php echo $course; ?></p>

<p><strong>Address:</strong> <?php echo $address; ?></p>

<a href="regform.php" class="btn btn-primary">
Register Another Student
</a>

</div>

</div>

</div>

</body>

</html>

<?php

}else{

echo mysqli_error($conn);

}

}

mysqli_close($conn);

?>