<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resgistration Form</title>
    <link rel="Stylesheet" href="css/formStylesheets.css"/>
    <style>
        h1{
            color:aqua; 
        }
    </style>
</head>
<body>
    <form action="registration.php" method="get">
        
     <h1 style="color:palevioletred;">Registration Form</h1>
     <p>Submit this form for online registration</p>

        <label> 
            Name:
        <input type="text" id="txtName" required placeholder="Enter your Name"/>
        </label>

        <br>

        <label> 
            Email:
            <input type="email" id ="txtEmail"required placeholder="Enter your Email"/>
        </label>

        <br>

        <label>
            Phone no:
            <input type="text" id="txtPhone" required placeholder="Enter your Phone"/>
        </label>

        <br>

        <form>
            <input type="radio" id="check Male" Name="Gender"/>
            <label for="check Male">Male</label>

<br>

            <input type="radio" id="check Female" Name="Gender"/>
            <label for="check Male">Female</label>

<br>

            <input type="radio" id="check Transgender" Name="Gender"/>
            <label for="check Transgender">Transgender</label>

<br>

            <input type="radio" id="check Other" Name="Gender"/>
            <label for="check Other">Prefer not to say</label>

<br>

            <label for="dtDOB">DOB</label>
            <input type="date" id="dtDOB" name="dtDOB"/>

<br>

            <label for="pwdPassword">Password</label>
            <input type="Password" id="pwdConfirmPassword"
            name="pwdConfirmPassword"/>
            
<br>  
            <input type="submit"id="btnSubmit"/>

        </form>
</body>
</html>