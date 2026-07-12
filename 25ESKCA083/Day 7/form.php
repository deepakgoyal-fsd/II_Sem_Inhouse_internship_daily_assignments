<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <h2>Registration Form</h2>
    <form style="background-color: #3D5A80; padding: 20px; border-radius: 10px; width: 500px; margin: auto;" action="process.php" method="post">
        
        <label for="name" style="font-weight: bold; color: #EDF6F9;">Name:</label>
        <input type="text" id="name" name="name" required placeholder="Enter your name" style="width: 30%; padding: 5px; margin-top: 5px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;"><br><br>
        
        <label for="rollno" style="font-weight: bold; color: #EDF6F9;">Roll No:</label>
        <input type="text" id="rollno" name="rollno" required placeholder="Enter roll number" style="width: 30%; padding: 5px; margin-top: 5px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;"><br><br>
        
        <label for="cgpa" style="font-weight: bold; color: #EDF6F9;">CGPA:</label>
        <input type="number" id="cgpa" name="cgpa" step="0.01" min="0" max="10" required placeholder="Enter CGPA" style="width: 30%; padding: 5px; margin-top: 5px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;"><br><br>   
        
        <label for="phonenumber" style="font-weight: bold; color: #EDF6F9;">Phone Number:</label>
        <input type="tel" id="phonenumber" name="phonenumber" required placeholder="Enter your phone number" style="width: 30%; padding: 5px; margin-top: 5px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;">
        <br><br>

        <label for="branch" style="font-weight: bold; color: #EDF6F9;">Branch:</label>
        <select name="branch" id="branch" required style="width: 30%; padding: 5px; margin-top: 5px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ccc;">
            <option value="">Select Branch</option>
            <option value="CSE">CSE</option>
            <option value="IT">IT</option>
            <option value="ECE">ECE</option>
            <option value="EEE">EEE</option>
            <option value="MECH">MECH</option>
        </select><br><br>
        
        <input type="checkbox" id="terms" name="terms" required style="margin-top: 5px; margin-bottom: 10px;">
        <label for="terms" style="font-weight: bold; color: #EDF6F9;">Terms And Condition</label> <br><br>
        
        <input type="submit" value="Submit" style="background-color: #E29578; color: #EDF6F9; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold;">
    </form>
</body>
</html>