<form method="post">
    <label>
        <input type="checkbox" name="agree" value="yes"> I have read the terms
    </label>
    <button type="submit">Submit</button>
</form>

<?php
if (isset($_POST['agree'])) {
    echo "Status: Agreed &#10003;";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Status: Not agreed - please tick the box";
} else {
    echo "Status: waiting for submission...";
}
?>
