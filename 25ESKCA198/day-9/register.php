<?php

include("db.php");

if(isset($_POST['register'])){

$name=$_POST['name'];

$email=$_POST['email'];

$branch=$_POST['branch'];

$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql="INSERT INTO users(name,email,branch,password)
VALUES('$name','$email','$branch','$password')";

if(mysqli_query($conn,$sql)){

echo "<script>

alert('Registration Successful');

window.location='index.php';

</script>";

}else{

echo "Error : ".mysqli_error($conn);

}

}

?>