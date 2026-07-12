<?php

include("header.php");

$name=$_POST['name'];
$email=$_POST['email'];
$cgpa=$_POST['cgpa'];
$branch=$_POST['branch'];
$college=$_POST['college'];

if(empty($name)||empty($email)||empty($cgpa)||empty($branch)||empty($college))
{
echo "<div class='alert alert-danger'>All fields are required.</div>";
include("footer.php");
exit();
}

function calculateGrade($cgpa)
{
if($cgpa>=9)
return "Excellent";
elseif($cgpa>=8)
return "Very Good";
elseif($cgpa>=7)
return "Good";
else
return "Keep Improving";
}

$grade=calculateGrade($cgpa);

echo "

<div class='card shadow p-4'>

<h2 class='text-success text-center'>
Welcome $name 🎉
</h2>

<hr>

<p><b>Email :</b> $email</p>

<p><b>CGPA :</b> $cgpa</p>

<p><b>Branch :</b> $branch</p>

<p><b>College :</b> $college</p>

<p><b>Grade :</b>

<span class='badge bg-primary'>
$grade
</span>

</p>

<p><b>Date :</b>

".date("d-m-Y")."

</p>

</div>

";

include("footer.php");

?>