<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo $_GET['username'];
}
?>
<form method="get">
  <input type="text" name="username">
  <button type="submit">Send</button>
</form>