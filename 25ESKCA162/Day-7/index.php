<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    
</head>
<body>

<h2>Student Registration Form</h2>

<form action="process.php" method="POST">

Name:<br>
<input type="text" name="name"><br><br>

Email:<br>
<input type="email" name="email"><br><br>

Phone:<br>
<input type="text" name="phone"><br><br>

Gender:<br>
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<input type="radio" name="gender" value="prefer not to say">Prefer not to say
<br><br>

Course:<br>
<select name="course">
<option>B.Tech</option>
    <option>M.Tech</option>
    <option>Phd</option>
</select><br><br>

Branch:<br>
<input type="text" name="branch"><br><br>

College:<br>
<input type="text" name="college"><br><br>



CGPA:<br>
<select name="cgpa">
    <option>9.0+</option>
    <option>8.5+</option>
    <option>8.0+</option>
    <option>7.5+</option>
    <option>7.0+</option>
    <option>6.0+</option>
    <option>5.0+</option>
    <option>Less than 5.0</option>
</select>
<br><br>

Address:<br>
<textarea name="address"></textarea>
<br><br>

Photo:<br>
<input type="file" name="photo">
<br><br>

<input type="submit" value="Register">

</form>

</body>
</html>
