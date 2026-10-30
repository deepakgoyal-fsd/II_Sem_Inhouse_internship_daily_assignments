<?php
function calculateGrade($cgpa){
 if($cgpa>=9) return ['Excellent','success'];
 if($cgpa>=8) return ['Very Good','primary'];
 if($cgpa>=7) return ['Good','warning'];
 return ['Keep Improving','danger'];
}
$name=$_POST['name']??'';
$email=$_POST['email']??'';
$cgpa=$_POST['cgpa']??0;
$branch=$_POST['branch']??'';
$college=$_POST['college']??'';
[$grade,$color]=calculateGrade($cgpa);
include 'header.php';
?>
<div class="card p-4">
<h2>Welcome, <?=htmlspecialchars($name)?>!</h2>
<p><?=date("l, F j, Y")?></p>
<div class="alert alert-<?=$color?>"><?=$grade?></div>
<ul class="list-group">
<li class="list-group-item"><b>Email:</b> <?=htmlspecialchars($email)?></li>
<li class="list-group-item"><b>CGPA:</b> <?=$cgpa?></li>
<li class="list-group-item"><b>Branch:</b> <?=htmlspecialchars($branch)?></li>
<li class="list-group-item"><b>College:</b> <?=htmlspecialchars($college)?></li>
</ul>
</div>
<?php include 'footer.php'; ?>