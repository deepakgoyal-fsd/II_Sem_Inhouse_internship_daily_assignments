<?php

$error ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = mysqli_real_escape_string($conn, $_POST["name"]);

$email = mysqli_real_escape_string($conn, $_POST["email"]);

$password = mysqli_real_escape_string($conn, $_POST["password"]);

$confirmPassword= mysqli_real_escape_string($conn,$_POST["confirmPassword"]);

if ($name =="" || $email =="" || $password =="" ||$confirmPassword ==""){

$error = "All fields are required.";

echo $error;
} else if($password != $confirmPassword) {

$error= "Password does not match.";

echo $error;
}else{

//insert

$insertQuery= "Insert into user(name,email,password) values('$name','$email','$password')";

$result=mysqli_query($conn,$insertQuery);

}

if($result){

header("Location:success.php");
}else {
    echo "error occured by storing data";

    echo "Error:" . mysqli_error($conn);

}

header("Location: successs.php");

exit();
}

?>
