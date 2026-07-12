<?php

include("../db_connect.php");
include("adminheader.php");


$id = $_SESSION['user_id'];



if($_SERVER["REQUEST_METHOD"]=="POST"){


$oldpassword = mysqli_real_escape_string($conn,$_POST['oldpassword']);

$newpassword = mysqli_real_escape_string($conn,$_POST['newpassword']);

$confirm = mysqli_real_escape_string($conn,$_POST['confirm']);



if($newpassword != $confirm){

    echo "Password does not match";

}

else{


$query = "SELECT password FROM user WHERE id='$id'";


$result = mysqli_query($conn,$query);


$user = mysqli_fetch_assoc($result);



if(password_verify($oldpassword,$user['password'])){


$newHash = password_hash($newpassword,PASSWORD_DEFAULT);



$update = "UPDATE user SET password='$newHash' WHERE id='$id'";


if(mysqli_query($conn,$update)){


echo "<div class='alert alert-success'>
Password Updated Successfully
</div>";


}


}
else{


echo "Old password incorrect";


}



}


}



?>


<div class="container mt-5">


<h3>Update Password</h3>


<form method="post">


<input 
type="password"
name="oldpassword"
class="form-control mb-3"
placeholder="Old Password"
>


<input 
type="password"
name="newpassword"
class="form-control mb-3"
placeholder="New Password"
>


<input 
type="password"
name="confirm"
class="form-control mb-3"
placeholder="Confirm Password"
>



<button class="btn btn-primary">
Update Password
</button>


</form>


</div>



<?php

include("../footer.php");

?>