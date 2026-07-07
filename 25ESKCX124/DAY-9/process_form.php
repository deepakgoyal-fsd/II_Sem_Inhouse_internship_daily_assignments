<?php

include("db_connect.php");

$errors = array();

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$birthdate = $_POST['birthdate'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$branch = $_POST['branch'];
$cgpa = $_POST['cgpa'];
$address = trim($_POST['address']);
$city = trim($_POST['city']);
$state = trim($_POST['state']);
$postal = trim($_POST['postal']);

if(isset($_POST['hobby']))
{
    $hobbies = implode(", ", $_POST['hobby']);
}
else
{
    $hobbies = "";
}

$terms = isset($_POST['terms']);


//-------------------- Validation --------------------//

if(empty($name))
{
    $errors[] = "Name is required.";
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $errors[] = "Enter a valid email.";
}

if(!is_numeric($phone) || strlen($phone)!=10)
{
    $errors[] = "Phone number must contain exactly 10 digits.";
}

if(empty($birthdate))
{
    $errors[] = "Select your birth date.";
}

if(empty($gender))
{
    $errors[] = "Select your gender.";
}

if(empty($branch))
{
    $errors[] = "Select your branch.";
}

if(empty($cgpa))
{
    $errors[] = "Enter your CGPA.";
}

if(empty($address))
{
    $errors[] = "Enter your address.";
}

if(empty($city))
{
    $errors[] = "Enter your city.";
}

if(empty($state))
{
    $errors[] = "Enter your state.";
}

if(empty($postal))
{
    $errors[] = "Enter your postal code.";
}

if(!$terms)
{
    $errors[] = "Accept the Terms & Conditions.";
}


//---------------- Duplicate Email ----------------//

$check = "SELECT * FROM students WHERE email='$email'";

$result = mysqli_query($conn,$check);

if(mysqli_num_rows($result)>0)
{
    $errors[] = "Email already registered.";
}


//---------------- Show Errors ----------------//

if(count($errors)>0)
{

?>

<!DOCTYPE html>

<html>

<head>

<title>Errors</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h2>Registration Failed</h2>

<ul>

<?php

foreach($errors as $error)
{
    echo "<li>$error</li>";
}

?>

</ul>

<br>

<a href="index.php">← Go Back</a>

</div>

</body>

</html>

<?php

exit();

}


//---------------- Save Data ----------------//

$sql = "INSERT INTO students
(name,email,phone,birthdate,gender,branch,cgpa,address,city,state,postal,hobbies)

VALUES

('$name','$email','$phone','$birthdate','$gender','$branch','$cgpa','$address','$city','$state','$postal','$hobbies')";


if(mysqli_query($conn,$sql))
{

?>

<!DOCTYPE html>

<html>

<head>

<title>Success</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h2 style="color:green;">Registration Successful!</h2>

<p>Your data has been saved successfully.</p>

<br>

<a href="index.php">Register Another Student</a>

<br><br>

<a href="students.php">View Student List</a>

</div>

</body>

</html>

<?php

}
else
{

echo "Error : ".mysqli_error($conn);

}

mysqli_close($conn);

?>