<?php

include("../db_connect.php");
include("teacherheader.php");


$id = $_SESSION['user_id'];


// Get teacher current data

$query = "SELECT * FROM user WHERE id='$id'";

$result = mysqli_query($conn,$query);

$teacher = mysqli_fetch_assoc($result);



if($_SERVER["REQUEST_METHOD"]=="POST"){


$name = mysqli_real_escape_string($conn,$_POST['name']);

$email = mysqli_real_escape_string($conn,$_POST['email']);

$phone = mysqli_real_escape_string($conn,$_POST['phone_number']);



$profilePic = "";


// Upload profile picture

if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error']==0){


    $uploadDir="../uploads/";


    if(!is_dir($uploadDir)){

        mkdir($uploadDir,0777,true);

    }


    $fileName=time()."_".basename($_FILES['profile_pic']['name']);


    $target=$uploadDir.$fileName;


    move_uploaded_file(
        $_FILES['profile_pic']['tmp_name'],
        $target
    );


    $profilePic="uploads/".$fileName;


}




if($profilePic!=""){


$update="UPDATE user SET

name='$name',
email='$email',
phone_number='$phone',
profile_pic='$profilePic'

WHERE id='$id'";


}
else{


$update="UPDATE user SET

name='$name',
email='$email',
phone_number='$phone'

WHERE id='$id'";


}



if(mysqli_query($conn,$update)){


echo "

<div class='alert alert-success'>

Profile Updated Successfully

</div>

";


// refresh

$query = "SELECT * FROM user WHERE id='$id'";

$result = mysqli_query($conn,$query);

$teacher=mysqli_fetch_assoc($result);


}



}



?>


<div class="container mt-5">


<h3>
Update Teacher Profile
</h3>



<form method="post" enctype="multipart/form-data">


<label>Name</label>

<input 
type="text"
name="name"
class="form-control mb-3"
value="<?= htmlspecialchars($teacher['name']); ?>"
>


<label>Email</label>

<input 
type="email"
name="email"
class="form-control mb-3"
value="<?= htmlspecialchars($teacher['email']); ?>"
>


<label>Phone Number</label>


<input 
type="text"
name="phone_number"
class="form-control mb-3"
value="<?= htmlspecialchars($teacher['phone_number']); ?>"
>


<label>Profile Picture</label>

<input 
type="file"
name="profile_pic"
class="form-control mb-3"
>



<label>Role</label>


<input 
type="text"
class="form-control mb-3"
readonly
value="<?= $teacher['role']; ?>"
>


<button class="btn btn-primary">

Update Profile

</button>


</form>


</div>



<?php

include("../footer.php");

?>