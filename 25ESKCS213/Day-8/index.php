<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow-lg border-0">

<div class="card-header text-center text-white">

<h2>

<i class="fa-solid fa-user-graduate"></i>

Student Registration System

</h2>

<p class="mb-0">

Fill the form carefully

</p>

</div>

<div class="card-body p-4">

<form action="register.php" method="POST" enctype="multipart/form-data">

<div class="text-center mb-4">

<img

src="https://cdn-icons-png.flaticon.com/512/149/149071.png"

id="preview"

class="profile-img"

>

</div>

<div class="mb-3">

<label class="form-label">

<i class="fa-solid fa-user"></i>

Full Name

</label>

<input

type="text"

name="name"

class="form-control"

required

>

</div>

<div class="row">

<div class="col-md-6">

<div class="mb-3">

<label class="form-label">

<i class="fa-solid fa-envelope"></i>

Email

</label>

<input

type="email"

name="email"

class="form-control"

required

>

</div>

</div>

<div class="col-md-6">

<div class="mb-3">

<label class="form-label">

<i class="fa-solid fa-phone"></i>

Phone

</label>

<input

type="text"

name="phone"

class="form-control"

required

>

</div>

</div>

</div>

<div class="mb-3">

<label class="form-label d-block">

<i class="fa-solid fa-venus-mars"></i>

Gender

</label>

<div class="form-check form-check-inline">

<input

class="form-check-input"

type="radio"

name="gender"

value="Male"

required

>

<label class="form-check-label">

Male

</label>

</div>

<div class="form-check form-check-inline">

<input

class="form-check-input"

type="radio"

name="gender"

value="Female"

>

<label class="form-check-label">

Female

</label>

</div>

</div>

<div class="mb-3">

<label class="form-label">

<i class="fa-solid fa-book"></i>

Course

</label>

<select

name="course"

class="form-select"

required

>

<option value="">

Choose Course

</option>

<option>

Computer Science

</option>

<option>

Information Technology

</option>

<option>

Electronics

</option>

<option>

Mechanical

</option>

<option>

Civil

</option>

</select>

</div>

<div class="mb-3">

<label class="form-label">

<i class="fa-solid fa-location-dot"></i>

Address

</label>

<textarea

name="address"

rows="4"

class="form-control"

required

></textarea>

</div>

<div class="mb-4">

<label class="form-label">

<i class="fa-solid fa-image"></i>

Profile Photo

</label>

<input

type="file"

name="photo"

id="photo"

class="form-control"

accept="image/*"

>

</div>

<div class="d-grid">

<button

class="btn btn-primary btn-lg"

type="submit"

>

<i class="fa-solid fa-paper-plane"></i>

Register Student

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

<script>

const photo=document.getElementById("photo");

const preview=document.getElementById("preview");

photo.addEventListener("change",function(){

const file=this.files[0];

if(file){

preview.src=URL.createObjectURL(file);

}

});

</script>

</body>

</html>