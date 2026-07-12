<?php

session_start();

include("db.php");

$email = $_POST['email'];

$password = $_POST['password'];

$sql = "SELECT * FROM users
WHERE email='$email'
AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1)
{

$user = mysqli_fetch_assoc($result);

$_SESSION['user_id'] = $user['id'];

$_SESSION['name'] = $user['name'];

$_SESSION['email'] = $user['email'];

$date = date("Y-m-d H:i:s");

mysqli_query(
$conn,
"UPDATE users
SET last_login='$date'
WHERE id=".$user['id']
);

header("Location: dashboard.php");

exit();

}

else
{

?>

<!DOCTYPE html>

<html>

<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="alert alert-danger">

<h4>Invalid Email or Password</h4>

<a
href="login.php"
class="btn btn-primary mt-3">

Back to Login

</a>

</div>

</div>

</body>

</html>

<?php

}

?>