<?php
include("DBconnect.php");
$error="";
if($_SERVER["REQUEST_METHOD"]=="POST")


{
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=$_POST['password'];

    if($email==""|| $password=="")
    {
        $error="all fields are required";
        echo $error; 
    }
    else
    {
        $selectQuery="SELECT * FROM user WHERE email='$email'";
        $result=mysqli_query($conn,$selectQuery);
        $user=mysqli_fetch_assoc($result);
    
        if($user && $password == $user['password']){

            
            
            $_SESSION['user_name']=$user['name'];
            $_SESSION['user_id']=$user['id'];
        
            
            if($user['role']=='admin'){
                header("location:admindashboard.php");
                exit();
            }

            else{
            header("location:dashboard.php");
            exit();
            }
        }   
        
            else{
            $error="invalid credentials";
           echo"invalid  credentials";
            echo"error:".mysqli_error($conn);
            }
        
    }   
}
?>