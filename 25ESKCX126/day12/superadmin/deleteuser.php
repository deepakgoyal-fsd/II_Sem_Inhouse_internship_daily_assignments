<?php

include("../db_connect.php");

include("superadminheader.php");



if(isset($_GET['id'])){


$id=$_GET['id'];



if($id == $_SESSION['user_id']){


echo "You cannot delete your own account";

exit();

}



$query="DELETE FROM user WHERE id='$id'";


if(mysqli_query($conn,$query)){


header("Location: manageusers.php");

exit();


}
else{


echo mysqli_error($conn);


}



}
else{


header("Location: manageusers.php");

exit();


}


?>