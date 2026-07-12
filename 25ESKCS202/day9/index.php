<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:linear-gradient(135deg,#4facfe,#00f2fe,#43e97b);
background-size:400% 400%;
animation:bgMove 10s infinite alternate;
font-family:Arial,Helvetica,sans-serif;
}

@keyframes bgMove{
0%{background-position:left;}
100%{background-position:right;}
}

.card{
margin-top:60px;
border:none;
border-radius:20px;
box-shadow:0 15px 35px rgba(0,0,0,.3);
animation:fadeIn 1s;
}

@keyframes fadeIn{
from{
opacity:0;
transform:translateY(40px);
}
to{
opacity:1;
transform:translateY(0);
}
}

.form-control{
border-radius:10px;
transition:.3s;
}

.form-control:focus{
transform:scale(1.02);
box-shadow:0 0 10px #0d6efd;
}

.btn-primary{
background:linear-gradient(45deg,#007bff,#6610f2);
border:none;
font-weight:bold;
padding:10px;
border-radius:10px;
transition:.3s;
}

.btn-primary:hover{
transform:translateY(-3px);
}

</style>

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card p-4">

<h2 class="text-center text-primary mb-4">
🎓 Student Registration
</h2>

<form action="process.php" method="POST">

<div class="mb-3">

<label>Name</label>

<input type="text" class="form-control" name="name" required>

</div>

<div class="mb-3">

<label>Email</label>

<input type="email" class="form-control" name="email" required>

</div>

<div class="mb-3">

<label>Branch</label>

<input type="text" class="form-control" name="branch" required>

</div>

<div class="mb-3">

<label>CGPA</label>

<input type="number" step="0.01" class="form-control" name="cgpa" required>

</div>

<button class="btn btn-primary w-100">
🚀 Register Student
</button>

</form>

</div>

</div>

</div>

</div>

</body>

</html>