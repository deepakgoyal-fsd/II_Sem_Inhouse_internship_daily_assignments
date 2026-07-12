<?php
$error = "";

$email ="";
$password ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    
    if ($email == "" || $password == "") {
        $error = "All fields are required.";
        echo $error;
    } else {
        //insert                       
        $selectQuery = "Select * from user where email='$email' and password = '$password'";

        $result= mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if($user && $user["password"]==$oldpassword){
            $updatequery = "update user set password='$newpassword' where id=$_SESSION['user_id"];
            $result=mysqli_query($conn,$updatequery);
        }            header("Location: dashboard.php");
        }elseif($user){
            echo "old password does not matched";
            exit();
        }else{
            echo "Invalid Credentials";
            echo "Error: " . mysqli_error($conn);
        }
       
    }
}
?>                                                  