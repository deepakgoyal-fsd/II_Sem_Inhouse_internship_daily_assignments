

<?php
$error = "";
$name="";
$email="";
$passwors="";
$confirmpassword="";
if($_SERVER["REQUEST_METHOD"] == "POST"){

$name = mysqli_real_escape_string($conn, $_POST["name"]);
$email =mysqli_real_escape_string($conn, $_POST["email"]);
$password =mysqli_real_escape_string($conn, $_POST["password"]);

$confirmpassword = mysqli_real_escape_string($conn,$_POST["confirmpassword"]);

if($name == "" || $email == "" || $password == "" || $confirmpassword == ""){
    $error = "all fields are required.";
echo $error;

}elseif($password !=$confirmpassword){
    $error = "password does not match.";
    echo $error;
}
    else{
    //insert
    $insertquery ="INSERT INTO user (name,email,password) VALUE ('$name','$email','$password')";

    $result = mysqli_query($conn,$insertquery);


    if($result){
        header("Location: success.php");
        exit();
    }
    else{
        echo "error occured while storing data";
        echo "error:" .mysqli_error($conn);
    }

    }

}
?>
