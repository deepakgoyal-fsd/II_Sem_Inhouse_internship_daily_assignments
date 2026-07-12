<?php
$total = 1;

// checking post-increment behaviour
$total++;   // same as $total = $total + 1;
$total++;   // did this twice to see the jump

echo 'Total after increments: ' . $total;
?>
