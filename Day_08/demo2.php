<?php
// playing around with built-in string functions
$fullName = "  mahesh yadav  ";

echo "Original: [" . $fullName . "]";
echo "<br>";

echo "After trim(): [" . trim($fullName) . "]";   // removes leading/trailing spaces
echo "<br>";

echo "Uppercase: " . strtoupper(trim($fullName));
echo "<br>";

echo "Lowercase: " . strtolower(trim($fullName));
echo "<br>";

echo "Length (with spaces): " . strlen($fullName);
echo "<br>";

echo "Length (trimmed): " . strlen(trim($fullName));
?>
