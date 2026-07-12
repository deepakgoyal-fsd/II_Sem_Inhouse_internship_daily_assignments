<!DOCTYPE html>
<html>
<head>

<title>Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php

$cgpa=$_POST['cgpa'];

if($cgpa>=9){

$msg="Excellent";

$class="success";

}

elseif($cgpa>=8){

$msg="Very Good";

$class="primary";

}

elseif($cgpa>=7){

$msg="Good";

$class="warning";

}

else{

$msg="Keep Improving";

$class="danger";

}

?>

<div class="container mt-5">

<div class="alert alert-<?php echo $class; ?>">

<h2>

CGPA : <?php echo $cgpa; ?>

</h2>

<h3>

<?php echo $msg; ?>

</h3>

</div>

</div>

</body>

</html>