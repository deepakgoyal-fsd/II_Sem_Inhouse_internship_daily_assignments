<!DOCTYPE html>
<html>

<head>

    <title>Student Registration Form</title>

    <link rel="stylesheet" href="style9.css">

</head>

<body>

<div class="container">

<h1>Student Registration Form</h1>

<form action="process_form.php" method="POST">

<label>Full Name</label>
<input type="text" name="name" placeholder="Enter Full Name">

<label>Email</label>
<input type="email" name="email" placeholder="Enter Email">

<label>Phone Number</label>
<input type="text" name="phone" placeholder="Enter Phone Number">

<label>Birth Date</label>
<input type="date" name="birthdate">

<label>Gender</label>

<div class="gender">

<input type="radio" name="gender" value="Male"> Male

<input type="radio" name="gender" value="Female"> Female

<input type="radio" name="gender" value="Other"> Other

</div>

<label>Branch</label>

<select name="branch">

<option value="">Select Branch</option>

<option>CSE</option>

<option>CSE (Data Science)</option>

<option>AI & ML</option>

<option>IT</option>

<option>ECE</option>

<option>Mechanical</option>

<option>Civil</option>

</select>

<label>CGPA</label>

<input type="number" step="0.01" name="cgpa" placeholder="Enter CGPA">

<label>Address</label>

<textarea name="address" rows="4" placeholder="Enter Address"></textarea>

<label>City</label>

<input type="text" name="city" placeholder="Enter City">

<label>State</label>

<input type="text" name="state" placeholder="Enter State">

<label>Postal Code</label>

<input type="text" name="postal" placeholder="Enter Postal Code">

<label>Hobbies</label>

<div class="check">

<input type="checkbox" name="hobby[]" value="Reading"> Reading

<input type="checkbox" name="hobby[]" value="Sports"> Sports

<input type="checkbox" name="hobby[]" value="Music"> Music

<input type="checkbox" name="hobby[]" value="Gaming"> Gaming

</div>

<label>

<input type="checkbox" name="terms">

I Agree to the Terms & Conditions

</label>

<br><br>

<input type="submit" value="Register">

<input type="reset" value="Reset">

</form>

</div>

</body>

</html>