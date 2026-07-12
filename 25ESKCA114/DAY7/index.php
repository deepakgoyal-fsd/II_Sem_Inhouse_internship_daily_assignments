<!DOCTYPE html>
<html>
<head>
    <title>Enhanced Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h2 class="text-center mb-4">Student Registration</h2>

        <form action="process.php" method="POST" enctype="multipart/form-data">

            <!-- Photo Upload -->
            <div class="text-center mb-3">
                <img id="preview" src="https://via.placeholder.com/120" class="rounded-circle mb-2" width="120" height="120">
                <input type="file" name="photo" class="form-control">
            </div>

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <!-- Gender -->
            <div class="mb-3">
                <label>Gender</label><br>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female" class="ms-3"> Female
                <input type="radio" name="gender" value="Other" class="ms-3"> Other
            </div>

            <!-- Sports Dropdown -->
            <div class="mb-3">
                <label>Favorite Sport</label>
                <select name="sport" class="form-control">
                    <option value="">Select Sport</option>
                    <option>Cricket</option>
                    <option>Football</option>
                    <option>Badminton</option>
                    <option>Basketball</option>
                </select>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Branch</label>
                <input type="text" name="branch" class="form-control">
            </div>

            <button class="btn btn-primary w-100">Register</button>

        </form>
    </div>
</div>

<script>
    // Image Preview
    document.querySelector("input[type='file']").addEventListener("change", function(e) {
        const file = e.target.files[0];
        if(file){
            document.getElementById("preview").src = URL.createObjectURL(file);
        }
    });
</script>

</body>
</html>