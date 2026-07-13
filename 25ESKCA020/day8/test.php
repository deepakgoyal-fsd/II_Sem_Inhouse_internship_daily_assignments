<?php
echo "Hi";
print "Hi"."World <br>";
print("Hi");

$age = 18;

if ($age >= 18) {
    print "Adult";
} else {
    print "Teenager";
}

echo "<br>";

// Ternary operator
echo ($age >= 18) ? "Adult" : "Teenager";
?>