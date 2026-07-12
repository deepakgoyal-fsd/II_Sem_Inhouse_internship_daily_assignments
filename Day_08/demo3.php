<?php
// testing post-increment vs just printing the same value
$clicks = 1;

echo "Counter: " . $clicks . "<br>";

$clicks++;
echo "Counter after ++: " . $clicks . "<br>";

$clicks++;
echo "Counter after ++: " . $clicks . "<br>";

// what happens with pre-increment instead
$clicks = 1;
echo "Pre-increment ++\$clicks: " . ++$clicks . "<br>";
?>
