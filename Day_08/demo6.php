<form method="post">
    <input type="checkbox" name="skills[]" value="HTML"> HTML
    <input type="checkbox" name="skills[]" value="CSS"> CSS
    <input type="checkbox" name="skills[]" value="PHP"> PHP
    <input type="checkbox" name="skills[]" value="JavaScript"> JavaScript
    <button type="submit">Submit</button>
</form>

<?php
if (!empty($_POST['skills'])) {
    $chosenSkills = $_POST['skills'];

    echo "You selected " . count($chosenSkills) . " skill(s):<br>";

    foreach ($chosenSkills as $index => $skill) {
        echo ($index + 1) . ". " . $skill . "<br>";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "No skills selected.";
}
?>
