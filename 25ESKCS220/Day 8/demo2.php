<!DOCTYPE html>
<html>
<body>

<form method="post">

Student Marks :
<input type="number" name="marks">

<button type="submit">Check Grade</button>

</form>

<?php

if(isset($_POST['marks']))
{
    $marks = $_POST['marks'];

    if($marks >= 90)
    {
        echo "A Grade";
    }
    elseif($marks >= 75)
    {
        echo "B Grade";
    }
    else
    {
        echo "C Grade";
    }
}

?>

</body>
</html>