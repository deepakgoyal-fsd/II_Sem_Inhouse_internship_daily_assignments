<?php

include("db_connect.php");

$id = $_GET["ID"];
$sql = "SELECT * FROM STUDENT WHERE ID = '$id' " ;
$result = mysqli_query($conn , $sql);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit details</title>
</head>
<body>
    <h2>EDIT DETAILS <h2>

    <form action="update.php" method="POST">
        <input type = "hidden" name="id" value="<?php echo $row['ID'];?>">S
            <label for="name">NAME</label>
            <br>
            <input type="text" placeholder="enter your full name" id="name" name="user_name" value="<?php echo $row['NAME'];?>">
            <br>
            <label for="email">EMAIL</label>
            <br>
            <input type="email" placeholder="enter your email" id="email" name="user_email"  value="<?php echo $row['EMAIL'];?>">
            <br>
            <label for="branch">BRANCH</label>
            <br>
            <input type="text" placeholder="enter your branch" id="branch" name="user_branch"  value="<?php echo $row['BRANCH'];?>">
            <br>
            <label for="cgpa">CGPA</label>
            <br>
            <input type="number" placeholder="enter your current cgpa" id="cgpa" name="user_cgpa"  value="<?php echo $row['CGPA'];?>">
            <br>
            <label for="mobile">PHONE NUMBER</label>
            <br>
            <input type="tel" placeholder="enter your mobile number" id="mobile" name="user_mobile"  value="<?php echo $row['PHONE'];?>">
            <label for="city">CITY</label>
            <br>
            <input type="text" placeholder="enter your city" id="city" name="user_city"  value="<?php echo $row['CITY'];?>">
            <br>

            <button name="btn_update">UPDATE</button>

</form>

<a href="index.php"><button>BACK</button></a>

           
        
</body>
</html>
