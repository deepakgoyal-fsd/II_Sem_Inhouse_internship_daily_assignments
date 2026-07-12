<?php
$name=$_POST["name"];
$email=$_POST["email"];
$phonenumber=$_POST["phonenumber"];

echo"values recieved:<br>$name<br>$email<br>$phonenumber";
?>
// if($_SERVER["REQUEST_METHOD"]=="POST"){
//     $newpassword=mysqli_real_escape_string($conn,$_POST["newpassword"]);
//     $oldpassword=mysqli_real_escape_string($conn,$_POST["oldpassword"]);
//     $confirmpassword=mysqli_real_escape_string($conn,$_POST["confirmpassword"]);
    
//     if($newpassword==""||$oldpassword==""||$confirmpassword== ""){
    //     $error="All fields are required";
    //     echo$error;

    // }elseif($newpassword!=$confirmpassword){
    // $error="password does not match";
    // echo$error;
    // }else{
    //     $selectQuery= "Select * from user where id=$_SESSION['user_id']";
    //     $result=mysqli_query($conn,$selectQuery);
    //     $user=mysqli_fetch_assoc($result);

   
       
    //     if($user&&$user["password"]==$oldpassword){
    //         $updateQuery="update user set password= '$newpassword' where id=$_SESSION["user_id"]";
    //          $result=mysqli_query($conn,$updateQuery);
//              header("Location: login.php");
//              exit();
//         }
//         else{
//             echo "Error updating pasword";
//             echo "Error:".mysqli_error($conn);

//         }
        
//     }else{
//             echo"Invalid credentials";
//             echo"Error:".mysqli_error($conn);
//         }
        
//     }
// 
// ?> 
   //    $updateQuery="update user set password= '$newpassword' where id=$_SESSION["user_id"]";
        
    //     $result=mysqli_query($conn,$updateQuery);
        
    //     $user=mysqli_fetch_assoc($result);
