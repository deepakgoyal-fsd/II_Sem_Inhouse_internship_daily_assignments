<?php
$classmates = ["Amit", "Neha", "Ravi", "Priya"];
$rollStart = 101;
?>

<ol start="<?= $rollStart ?>">
<?php foreach ($classmates as $i => $name) { ?>
    <li>Roll No. <?= $rollStart + $i ?> - <?= $name ?></li>
<?php } ?>
</ol>

<?php
echo "Total students: " . count($classmates);
?>
