<!DOCTYPE html>
<html>

<head>

<title>Student Registration</title>


<!-- Bootstrap CSS -->
<link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">


<style>

body{

background:#eaf0ff;

}


.card{

border-radius:20px;
box-shadow:0px 5px 15px gray;

}


</style>


</head>



<body>



<div class="container my-5">


<div class="card p-5">


<h2 class="text-center mb-4">
🎓 Student Registration
</h2>



<form 
action="process.php"
method="POST"
enctype="multipart/form-data">





<div class="mb-3">

<label class="form-label">
Name
</label>


<input 
type="text"
name="name"
class="form-control"
placeholder="Enter your full name">

</div>








<div class="mb-3">


<label class="form-label">
Email
</label>


<input
type="email"
name="email"
class="form-control"
placeholder="Enter your email">

</div>









<div class="mb-3">


<label class="form-label">
Phone
</label>


<input
type="text"
name="phone"
class="form-control"
placeholder="Enter 10 digit mobile number">

</div>










<div class="mb-3">


<label class="form-label">
Branch
</label>


<input
type="text"
name="branch"
class="form-control"
placeholder="Enter your branch">

</div>










<div class="mb-3">


<label class="form-label">
Gender
</label>

<br>


<input 
type="radio"
name="gender"
value="Male">

Male



<input
type="radio"
name="gender"
value="Female">

Female


</div>











<div class="mb-3">


<label class="form-label">
Course
</label>


<select
name="course"
class="form-select">


<option value="">
Select Course
</option>


<option>
B.Tech
</option>


<option>
BCA
</option>


<option>
MCA
</option>


</select>


</div>









<div class="mb-3">


<label class="form-label">
Address
</label>



<textarea
name="address"
class="form-control"
placeholder="Enter your address">

</textarea>


</div>










<div class="mb-3">


<label class="form-label">
Profile Photo
</label>



<input
type="file"
name="photo"
class="form-control">


</div>









<button
class="btn btn-primary w-100">

Submit Registration

</button>





</form>


</div>


</div>



</body>

</html>