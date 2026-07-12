<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_POST['username'];
}
?>
<form method = "post" action="">
    <input type = "text" name = "username" >
    <button type = "submit">Submit</button>
 </form>                 