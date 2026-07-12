<!DOCTYPE html>
<html>
<head>

<title>Welcome Card</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php

$name=$_POST['name'];

$branch=$_POST['branch'];

$college=$_POST['college'];

function getFormattedDate(){

return date("l, F j, Y");

}

$hour=date("H");

if($hour<12)

$greet="Good Morning";

elseif($hour<17)

$greet="Good Afternoon";

else

$greet="Good Evening";

?>

<div class="container mt-5">

<div class="card shadow p-4">

<h2>

<?php echo $greet; ?>

</h2>

<hr>

<h3>

Welcome

<?php echo $name; ?>

</h3>

<p>

<?php echo getFormattedDate(); ?>

</p>

<p>

<b>Branch :</b>

<?php echo $branch; ?>

</p>

<p>

<b>College :</b>

<?php echo $college; ?>

</p>

</div>

</div>

</body>

</html>