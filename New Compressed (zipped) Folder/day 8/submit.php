<?php
$student_name = $_POST['name'];
$student_branch = $_POST['branch'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="card p-4 shadow-sm text-center bg-white">
                    <h3 class="text-success mb-3">Submission Processed!</h3>
                    <p class="text-muted">Your dynamic student summary record is ready:</p>
                    
                    <table class="table table-bordered table-striped mt-3">
                        <tr class="table-dark">
                            <th>Category</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td><strong>Student Name</strong></td>
                            <td><?php echo $student_name; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Branch Code</strong></td>
                            <td><?php echo $student_branch; ?></td>
                        </tr>
                    </table>
                    
                    <div class="mt-4">
                        <a href="index.html" class="btn btn-secondary btn-sm">Return to Form</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>