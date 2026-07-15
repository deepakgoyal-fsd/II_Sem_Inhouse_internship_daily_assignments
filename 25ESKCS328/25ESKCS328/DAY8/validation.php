<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$marks = $_POST['marks'];

if(empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($phone)!=10){
    die("Invalid Input");
}

if($marks>=90)
    $grade="A";
elseif($marks>=75)
    $grade="B";
elseif($marks>=50)
    $grade="C";
else
    $grade="Fail";
?>

<!DOCTYPE html>
<html>
<head>
<title>Confirmation</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Registration Successful</h2>

<p><b>Name:</b> <?php echo $name; ?></p>
<p><b>Email:</b> <?php echo $email; ?></p>
<p><b>Phone:</b> <?php echo $phone; ?></p>
<p><b>Marks:</b> <?php echo $marks; ?></p>
<p><b>Grade:</b> <?php echo $grade; ?></p>

</body>
</html>