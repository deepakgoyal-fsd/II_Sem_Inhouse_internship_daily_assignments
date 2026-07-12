<!DOCTYPE html>
<html>
<body>

<form method="post">

<input type="checkbox" name="agree">
I Agree

<button type="submit">Submit</button>

</form>

<?php

if(isset($_POST['agree']))
{
    echo "Agreed";
}
else
{
    echo "Not Agreed";
}

?>

</body>
</html>