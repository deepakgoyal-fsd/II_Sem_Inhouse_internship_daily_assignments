<?php
// tried a few ways to do this before settling on the null coalescing operator

// $userName = empty($_POST['name']) ? '' : $_POST['name'];
//
// if (empty($_POST['name'])) {
//     $userName = "";
// } else {
//     $userName = $_POST['name'];
// }

$userName = trim($_POST['name'] ?? '');

if ($userName === '') {
    echo "Name field can't be blank";
} else {
    echo "Welcome, $userName!";
}
?>
