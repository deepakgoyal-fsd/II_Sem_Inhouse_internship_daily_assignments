<form method="post">
    <input type="radio" name="gender" value="Male" id="male"> <label for="male">Male</label>
    <input type="radio" name="gender" value="Female" id="female"> <label for="female">Female</label>
    <button type="submit">Submit</button>
</form>

<?php
$selectedGender = $_POST['gender'] ?? null;

if ($selectedGender) {
    echo "You selected: " . $selectedGender;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Please select an option before submitting.";
}
?>
