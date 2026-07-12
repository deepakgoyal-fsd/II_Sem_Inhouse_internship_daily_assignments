<?php

session_start();

include "db.php";


if(isset($_POST['login']))
{

$email=$_POST['email'];

$password=$_POST['password'];


$sql="SELECT * FROM users 
WHERE email='$email' 
AND password='$password'";


$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0)
{

$row=mysqli_fetch_assoc($result);


$_SESSION['user_id']=$row['id'];

$_SESSION['name']=$row['name'];


header("Location: dashboard.php");

exit();

}

else
{

$error="Invalid Email or Password";

}


}


?>


<?php include "header.php"; ?>


<div class="container mt-5">


<div class="card p-5 shadow">


<h1 class="text-center">🔐 Login</h1>


<?php

if(isset($error))
{
    echo "<div class='alert alert-danger'>$error</div>";
}

?>


<form method="POST">


<label>Email</label>

<input type="email" 
name="email" 
class="form-control" 
required>


<br>


<label>Password</label>

<input type="password" 
name="password" 
class="form-control" 
required>


<br>


<button 
class="btn btn-primary w-100"
name="login">

Login

</button>


</form>


</div>


</div>


<?php include "footer.php"; ?>