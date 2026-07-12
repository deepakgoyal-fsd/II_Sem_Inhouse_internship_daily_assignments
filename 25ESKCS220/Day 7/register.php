<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Student Registration Form</h3>
                </div>

                <div class="card-body">

                    <form action="process.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Enter Full Name" required>
                        </div>

                    
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>

            
                        <div class="mb-3">
                            <label class="form-label">Branch</label>
                            <input type="text" name="branch" class="form-control" placeholder="Enter Branch" required>
                        </div>

            
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                        </div>

                    
                        <div class="mb-3">
                            <label class="form-label">Profile Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                
                        <div class="mb-3">
                            <label class="form-label d-block">Gender</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Male">
                                <label class="form-check-label">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Female">
                                <label class="form-check-label">Female</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="Other">
                                <label class="form-check-label">Other</label>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Course</label>
                            <select name="course" class="form-select">
                                <option selected disabled>Select Course</option>
                                <option>B.Tech</option>
                                <option>BCA</option>
                                <option>B.Sc</option>
                                <option>B.Com</option>
                                <option>MCA</option>
                                <option>M.Tech</option>
                            </select>
                        </div>

            
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="4" placeholder="Enter Address"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>