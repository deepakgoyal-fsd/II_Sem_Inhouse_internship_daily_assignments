<?php


$error = "";
$success = "";

$name = "";
$selectedSkills = [];

$skillOptions = [
    "HTML",
    "CSS",
    "Bootstrap",
    "JavaScript",
    "PHP",
    "MySQL",
    "Python",
    "Java",
    "C++",
    "React"
];

$userId = $_SESSION['user_id'];

$selectQuery = "SELECT * FROM user WHERE id = $userId";
$result = mysqli_query($conn, $selectQuery);
$user = mysqli_fetch_assoc($result);

if ($user) {
    $name = $user['name'];
    $selectedSkills = $user['skills'] != "" ? explode(", ", $user['skills']) : [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"] );

    $selectedSkills = $_POST["skills"] ;


    $selectedSkills = array_intersect($skillOptions, $selectedSkills);

    $skillsString = implode(", ", $selectedSkills);
    $skillsString = mysqli_real_escape_string($conn, $skillsString);

    if ($name == "") {
        $error = "Name is required";
    } else {
        $updateQuery = "UPDATE user SET name = '$name', skills = '$skillsString' WHERE id = $userId";
        mysqli_query($conn, $updateQuery);

        $_SESSION['user_name'] = $name;

        $success = "Profile updated successfully";
    }
}
?>