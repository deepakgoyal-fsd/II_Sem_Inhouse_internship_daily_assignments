<?php

include("db_connect.php");
$error="";
$name="";
$email="";
$password="";
$confirmpassword="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=mysqli_real_escape_string($conn,$_POST["name"]);
     $email=mysqli_real_escape_string($conn, $_POST["email"]);
      $password=mysqli_real_escape_string($conn, $_POST["password"]);
       $confirmpassword=mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

       if($name==""||$email==""||$password==""||$confirmpassword==""){
        $error="All fielsd are required.";
        echo $error;
       }
       elseif($password!=$confirmpassword){
        $error="Password does not match.";
        echo $error;
       }
        else{
            // insert
            $insertQuery="Insert INTO  user(name,email,password) VALUES('$name','$email','$password')";
            $result=mysqli_query($conn,$insertQuery);
            if($result){
    
            
        header("Location: success.php");
        exit();}
        else{ 
            echo"error occured ehole storing data";
            echo"Error: ". mysqli_error($conn);
        }
        
       }

}
?>