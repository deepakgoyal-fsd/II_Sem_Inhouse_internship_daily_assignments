<?php

include("db.php");

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql="INSERT INTO students(name,email,password)
VALUES('$name','$email','$password')";

if(mysqli_query($conn,$sql))
{
echo "<script>

alert('Registration Successful');

window.location='login.php';

</script>";
}
else
{
echo "Error";
}

?>