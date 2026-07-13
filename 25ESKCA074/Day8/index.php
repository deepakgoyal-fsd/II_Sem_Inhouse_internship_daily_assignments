<!DOCTYPE html>
<html>
<head>
    <title>Welcome Card Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Welcome Card Generator</h1>

    <form method="post">

        <label>Student Name</label><br>
        <input type="text" name="name" required><br><br>

        <label>Branch</label><br>
        <input type="text" name="branch" required><br><br>

        <label>College Name</label><br>
        <input type="text" name="college" required><br><br>

        <input type="submit" value="Generate Card">

    </form>

    <br>

<?php

function getFormattedDate()
{
    return date("l, F j, Y");
}

function getGreeting()
{
    $hour = date("H");

    if($hour < 12)
    {
        return "Good Morning";
    }
    elseif($hour < 17)
    {
        return "Good Afternoon";
    }
    else
    {
        return "Good Evening";
    }
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=$_POST["name"];
    $branch=$_POST["branch"];
    $college=$_POST["college"];

?>

<div class="card">

<h2>Welcome!</h2>

<h3><?php echo $name; ?></h3>

<p><?php echo getGreeting(); ?></p>

<p><?php echo getFormattedDate(); ?></p>

<hr>

<p><b>Branch :</b> <?php echo $branch; ?></p>

<p><b>College :</b> <?php echo $college; ?></p>

</div>

<?php
}
?>

</div>

</body>
</html>
