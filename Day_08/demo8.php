<form method="post">
    <select name="branch">
        <option value="">-- Select Branch --</option>
        <option value="CSE">CSE</option>
        <option value="IT">IT</option>
        <option value="ECE">ECE</option>
        <option value="Mechanical">Mechanical</option>
    </select>
    <button type="submit">Submit</button>
</form>

<?php
if (!empty($_POST['branch'])) {
    echo "Branch chosen: " . $_POST['branch'];
    echo "<br>";
    echo "Nice choice!";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Please pick a branch from the list.";
}
?>
