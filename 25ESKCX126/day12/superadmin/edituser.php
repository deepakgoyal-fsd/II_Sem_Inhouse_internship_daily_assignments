<?php

include("../db_connect.php");

include("superadminheader.php");



if(!isset($_GET['id'])){

header("Location: manageusers.php");

exit();

}



$id=$_GET['id'];



$query="SELECT * FROM user WHERE id='$id'";

$result=mysqli_query($conn,$query);


$user=mysqli_fetch_assoc($result);





if($_SERVER["REQUEST_METHOD"]=="POST"){



$name=$_POST['name'];

$email=$_POST['email'];

$phone=$_POST['phone_number'];

$role=$_POST['role'];




$update="UPDATE user SET

name='$name',
email='$email',
phone_number='$phone',
role='$role'

WHERE id='$id'";



if(mysqli_query($conn,$update)){


header("Location: manageusers.php");

exit();


}


}



?>


<div class="container mt-5">


<h3>Edit User</h3>


<form method="post">


<input 
class="form-control mb-3"
name="name"
value="<?= $user['name']; ?>"
>


<input 
class="form-control mb-3"
name="email"
value="<?= $user['email']; ?>"
>


<input 
class="form-control mb-3"
name="phone_number"
value="<?= $user['phone_number']; ?>"
>



<select name="role" class="form-control mb-3">


<option value="student"
<?= $user['role']=="student"?"selected":"" ?>>
Student
</option>


<option value="teacher"
<?= $user['role']=="teacher"?"selected":"" ?>>
Teacher
</option>


<option value="admin"
<?= $user['role']=="admin"?"selected":"" ?>>
Admin
</option>


<option value="superadmin"
<?= $user['role']=="superadmin"?"selected":"" ?>>
Superadmin
</option>


</select>



<button class="btn btn-primary">

Update

</button>


</form>


</div>


<?php

include("../footer.php");

?>