<?php 
include("db_connect.php");

$name = "";
$branch = "";
$cgpa = "";
$pwd = "";
$cnfpwd = "";
$error = "";
$sql = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $branch = $_POST["branch"];
        $cgpa = $_POST["cgpa"];
        $pwd = $_POST["pwdPassword"];
        $cnfpwd = $_POST["pwdConfirmPassword"];
}

if(empty($name)){
    $error .=  "Please enter your name<br>";
}

if(empty($branch)){
    $error .= "Please enter your Branch Id<br>";
}

if(empty($cgpa)){
    $error .="Please enter your cgpa<br>";
}

if(empty($pwd)){
    $error .="Please enter your password<br>";
}

if(empty($cnfpwd)){
    $error .="Please confirm your password<br>";
}

if($pwd != $cnfpwd){
    $error.= "Password and Conform Password does not match<br>";
}

if($error!= ""){
    echo $error;
}

else{
    include("process_form.php");
    echo "Form submitted successfully<br>";
    
}
?>