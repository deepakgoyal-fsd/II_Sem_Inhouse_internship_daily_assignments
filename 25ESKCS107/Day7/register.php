<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{ 
       margin: 0;
       padding: 0;

    }
    body{
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container{
        width: 600px;
        height: 700px;
        display: flex;
        background-color: lightgrey;
        flex-direction: column;
        align-items: center;
    }
    h1{
        text-transform: uppercase;
        font-size: 2em;
        padding: 20px;
        align-items: center;
    
    }


</style>
<body>
    <div class="container">
        
    <h1>Registration Form</h1>
    <form action="process.php" method="POST"> 
        <label for="name" >Name</label><br>
        <input type="text" name="name" placeholder="Enter your name"><br>
        <label for="college" >College</label><br>
       <input type="text" name="college" placeholder="Enter your college"><br>
       <label for="branch" >Branch</label><br>
        <input type="text" name="branch" placeholder="Enter your branch"><br><br>
<input type="submit" class="form-control btn-primary" name="submit" value="submit">
    </form>
    </div>
</body>
</html>