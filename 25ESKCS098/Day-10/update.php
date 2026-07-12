<?php

include("db_connect.php");

$id=$_POST['id'];

$name=$_POST['name'];

$email=$_POST['email'];

$branch=$_POST['branch'];

$cgpa=$_POST['cgpa'];

$sql="UPDATE students SET

name='$name',

email='$email',

branch='$branch',

cgpa='$cgpa'

WHERE id='$id'";

if(mysqli_query($conn,$sql)){

header("Location: students.php?msg=Record Updated Successfully");

}

else{

echo "Update Failed";

}

?>