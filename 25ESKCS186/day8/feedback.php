<!DOCTYPE html>
<html>
<head>

<title>Feedback Form</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card p-4 shadow">

<h2>Feedback Form</h2>

<form action="feedback_result.php" method="POST">

<label>Name</label>

<input type="text" name="name" class="form-control">

<br>

<label>Email</label>

<input type="email" name="email" class="form-control">

<br>

<label>Message</label>

<textarea name="message" class="form-control"></textarea>

<br>

<button class="btn btn-success">

Submit

</button>

</form>

</div>

</div>

</body>

</html>