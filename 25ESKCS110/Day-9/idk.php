<?php
if ($_SERVER['REQUEST_METHOD']==='POST'){
    echo $_POST['username'];
}
?>
<form method = 'get'>
  <input type="text" name="username">
  <button type= "submit"> submit </button>
</form>
//https://localhost/phpmyadmin