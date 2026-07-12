<?php
// grade calculator - practicing if/elseif/else
$score = 75;

if ($score >= 90) {
    $grade = "A Grade";
} elseif ($score >= 75) {
    $grade = "B Grade";
} elseif ($score >= 60) {
    $grade = "C Grade";
} else {
    $grade = "D Grade - needs improvement";
}

echo "Score: $score <br>";
echo "Result: $grade";
?>
