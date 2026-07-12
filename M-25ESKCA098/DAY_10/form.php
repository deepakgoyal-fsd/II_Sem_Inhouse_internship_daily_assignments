<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
   *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
   }
   body{
    background-color: yellowgreen;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;

   }
   .container{
    background-color: white;
    padding: 30px;
    border-radius: 15px;
    width: 40%;
    height: 90%;
   }
   h1{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 40px;
   }
   input,select{
     font-size: 16px;
     width: 100%;
     padding: 12px;
border: 1px solid grey;
    margin-bottom: 80px;
   }
   button{
    font-size: 16px;
    width: 100%;
    padding: 12px;
    border: 1px solid grey;

   }
   button:hover{
    background-color: red;
   }
    </style>
</head>
<body>
    <?php
    include('db_connect.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $email=mysqli_real_escape_string($sonn,$_POST['email']);
        $phonenumber=mysqli_real_escape_string($conn,$_POST['phonenumber']);

        $sql="INSERT INTO user(name,email,phonenumber) VALUES('$name,'$email','$phonenumber')";

        if(mysqli_query($conn,$sql)){
            echo"student registration succesfully";
    
        }
        else{
            echo"Error:".mysqli_error($conn);
        }
    }
    ?>

    <div class="container">
    <form action="registration.php" method="POST" enctype="multipart/form-data" >
        <h1>Registration form</h1>
    <input  type="text"  name="name" placeholder="Enter your name">
    <br>
    <input type="email" name="email" placeholder="Enter your email">
    <br>
    <input type="text"  name="phonenumber" placeholder="Enter your phonenumber">
    <br>
    <select>
        
        <option value="">Gender</option>
        <option value="male">male</option>
        <option value="female">female</option>
    
    </select>
    <br>
    <button type="submit">submit</button>
</form>
</div>
</body>
</html>