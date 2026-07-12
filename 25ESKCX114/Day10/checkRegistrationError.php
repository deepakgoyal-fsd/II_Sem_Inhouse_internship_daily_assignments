<?php
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$name = mysqli_real_escape_string($conn, $_POST["name"]);
$email =mysqli_real_escape_string($conn, $_POST["email"]);
$password =mysqli_real_escape_string($conn, $_POST["password"]);
$phoneno=mysqli_real_escape_string($conn, $_POST["phone_number"]);
$confirmpassword = mysqli_real_escape_string($conn,$_POST["cpassword"]);
$hashedpassword = password_hash($password , PASSWORD_DEFAULT);

if (strlen($password) < 8) {
    echo "Password must be at least 8 characters long.";
}
elseif (!preg_match("/[A-Z]/", $password)) {
    echo "Password must contain at least one uppercase letter.";
}
elseif (!preg_match("/[a-z]/", $password)) {
    echo "Password must contain at least one lowercase letter.";
}
elseif (!preg_match("/[0-9]/", $password)) {
    echo "Password must contain at least one number.";
}
elseif (!preg_match("/[!@#$%^&*]/", $password)) {
    echo "Password must contain at least one special character.";
}elseif($password !=$confirmpassword){
    $error = "password does not match.";
    echo $error;
}
    else{
    //insert
    $insertquery ="INSERT INTO user (name,email,phone_number,password) VALUES ('$name','$email','$phoneno','$hashedpassword')";

    $result = mysqli_query($conn,$insertquery);


    if ($result) {
    header("Location: success.php");
    exit();
}
    else{
        echo "error occured while storing data";
        echo "error:" .mysqli_error($conn);
    }

    exit();

    }

}
?>
