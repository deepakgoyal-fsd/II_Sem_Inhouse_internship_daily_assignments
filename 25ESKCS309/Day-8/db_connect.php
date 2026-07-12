<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> -->
    <?php


       $host   ="localhost";
       $user   ="root";
       $password   ="";
       $database  ="students_management";

       $conn = mysqli_connect($host,$user,$password,$database);

       if(!$conn){
        die("connection failed:".mysqli_connect_error());

       }

       
    //   echo("connected successfully");
      
      
 








    ?>
<!-- </body>
</html> -->