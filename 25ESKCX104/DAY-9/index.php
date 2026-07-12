<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT REGISTRATION FORM</title>
</head>
<body>
    <h2 align="centre">STUDENT REGISTRATION FORM</h2>
    <form action="process_form.php" method="POST">
    <table align="center" cellpadding="10">
    <tr>
    <td>Name</td>
    <td>
        <input type="text" name="name" required>
    </td>
    </tr>
    <tr>
    <td>Email</td>
    <td>
        <input type="email" name="email" required>
    </td>
    </tr>
    <tr>
    <td>Branch</td>
    <td>
        <select name="branch" required>
            <option value="">Select Branch</option>
            <option>CSE</option>
            <option>Data Science</option>
            <option>AI & ML</option>
            <option>IT</option>
            <option>ECE</option>
            <option>Mechanical</option>
        </select>
    </td>
    </tr>
    <tr>
    <td>CGPA</td>
    <td>
        <input type="number" step="0.01" name="cgpa" min="0" max="10" required>
    </td>
    </tr>
    <tr>
    <td>Address</td>
    <td>
        <textarea name="address" rows="4" cols="22" required></textarea>
    </td>
    </tr>
    <tr>
    <td>Course</td>
    <td>
        <input type="text" name="course" required>
    </td>
    </tr>
    <tr>
    <td colspan="2" align="center">
        <input type="submit" value="Register">
        <input type="reset" value="Clear">
    </td>
    </tr>
</table>
</form>
</body>
</html>
