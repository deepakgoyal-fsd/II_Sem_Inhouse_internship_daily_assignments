<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add Student</h2>

<form action="insert.php" method="POST" enctype="multipart/form-data">
    

    <label>Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Branch</label><br>
    <select name="branch" required>
        <option value="">Select Branch</option>
        <option value="CSE">CSE</option>
        <option value="IT">IT</option>
        <option value="ECE">ECE</option>
        <option value="ME">ME</option>
    </select><br><br>

    <label>CGPA</label><br>
    <input type="number" step="0.01" name="cgpa" required><br><br>

    <label>Photo</label><br>
<input type="file" name="photo"><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select><br><br>

    <button type="submit">Add Student</button>

</form>

</body>
</html>