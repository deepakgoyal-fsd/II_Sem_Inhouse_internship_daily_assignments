<?php

include("db_connect.php");
if(isset($_POST["btn_submit"])){
$name = $_POST["user_name"];
$email = $_POST["user_email"];
$branch = $_POST["user_branch"];
$cgpa = $_POST["user_cgpa"];
$phone = $_POST["user_mobile"];
$city = $_POST["user_city"];

$sql = "INSERT INTO STUDENT( NAME , EMAIL , BRANCH , CGPA , PHONE , CITY ) values('$name' , '$email' , '$branch' , '$cgpa' , '$phone' , '$city')";
$result = mysqli_query($conn , $sql);

if($result){
    
    header("Location: index.php");
    exit();
}else{
    echo "there is some error plese try again ";
}
}

?>