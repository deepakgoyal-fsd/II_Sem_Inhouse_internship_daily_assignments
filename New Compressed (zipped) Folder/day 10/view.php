<?php
// 1. Pull in the central database credentials we created on Day 9
include 'db.php';

// 2. Check if a user clicked a "Delete Record" link button link row
if (isset($_GET['delete_id'])) {
    $target_id = $_GET['delete_id'];
    
    // Construct and execute the targeted row deletion string command
    $delete_query = "DELETE FROM students WHERE id = $target_id";
    mysqli_query($conn, $delete_query);
    
    // Refresh the view page grid instantly to show the row is gone
    header("Location: view.php");
}

// 3. Query all persistent student data tracking loops currently inside the database
$result = mysqli_query($conn, "SELECT * FROM students");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Day 10 Assignment - CRUD Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card p-4 shadow-sm bg-white border">
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                <h3 class="text-dark fw-bold mb-0">Live Student Management Panel</h3>
                <a href="index.html" class="btn btn-primary btn-sm fw-bold">+ Register New Entry</a>
            </div>

            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Student Name Name</th>
                        <th>Engineering Branch</th>
                        <th style="width: 150px;" class="text-center">System Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if our database query found any entries
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through rows one row table entry record array element block at a time
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td><strong>" . $row['name'] . "</strong></td>";
                            echo "<td><span class='badge bg-secondary'>" . $row['branch'] . "</span></td>";
                            // The delete string passes the row's unique identifier primary key inside a URL query parameter string
                            echo "<td class='text-center'><a href='view.php?delete_id=" . $row['id'] . "' class='btn btn-danger btn-sm fw-bold'>Delete Record</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        // Empty row display fallback tracking states
                        echo "<tr><td colspan='4' class='text-center text-muted py-3'>No dynamic database records found in phpMyAdmin rows.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>