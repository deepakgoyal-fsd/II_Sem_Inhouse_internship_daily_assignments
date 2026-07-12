<?php

$page="students";

include("header.php");
include("db_connect.php");

$id=$_POST['id'];

$name=$_POST['name'];

$email=$_POST['email'];

$branch=$_POST['branch'];

$cgpa=$_POST['cgpa'];

if($cgpa<0 || $cgpa>10)
{

?>

<div class="alert alert-danger">

CGPA must be between 0 and 10.

</div>

<a href="students.php"
class="btn btn-primary">

Back

</a>

<?php

include("footer.php");

exit();

}

$sql="UPDATE students

SET

name='$name',

email='$email',

branch='$branch',

cgpa='$cgpa'

WHERE id=$id";

if(mysqli_query($conn,$sql))
{

?>

<div
id="successAlert"
class="alert alert-success">

Student updated successfully.

</div>

<script>

setTimeout(function(){

window.location="students.php";

},3000);

</script>

<?php

}
else
{

?>

<div class="alert alert-danger">

Update Failed.

</div>

<?php

}

include("footer.php");

?>