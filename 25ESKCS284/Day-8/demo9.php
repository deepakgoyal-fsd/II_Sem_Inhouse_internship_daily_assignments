<?php
$students = ["Rishabh", "Roshan", "Ramratan","Priyanshu","Prateek","Praveen"];
?>

<ul>
<?php foreach ($students as $s) { ?>
    <li><?= $s ?></li>
<?php } ?>
</ul>