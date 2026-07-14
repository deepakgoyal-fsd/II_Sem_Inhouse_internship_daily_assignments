<?php
// Check karte hain ki data POST method se aaya hai ya nahi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Form se data collect aur sanitize kar rahe hain taaki security bani rahe
    $name = htmlspecialchars($_POST['student_name']);
    $college = htmlspecialchars($_POST['student_college']);
    $branch = htmlspecialchars($_POST['student_branch']);

    // Agar saari fields filled hain, toh display karenge
    if (!empty($name) && !empty($college) && !empty($branch)) {
        echo "<h2>Thank you, $name! Your data was received.</h2>";
        echo "<p><strong>College:</strong> $college </p>";
        echo "<p><strong>Branch:</strong> $branch </p>";
    } else {
        echo "Please fill all the required fields.";
    }

} else {
    // Agar koi directly process.php open karega toh yeh message dikhega
    echo "Direct access not allowed. Please submit the form first.";
}
?>