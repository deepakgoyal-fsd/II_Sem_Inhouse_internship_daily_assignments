<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET['uname'])) {
    echo "Hello, " . $_GET['uname'] . "!";
}
?>
<form method="get">
  <input type="text" name="uname" placeholder="Enter username">
  <button type="submit">Send</button>
</form>
