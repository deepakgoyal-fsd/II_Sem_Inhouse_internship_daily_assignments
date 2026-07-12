<?php
// =========================================================
// SEARCH.PHP
// =========================================================
// This file searches the conversion_history table using the
// text typed by the user (date, time zone, or input time).
// It shows the same page layout as index.php, but with the
// filtered results in the history table.
// =========================================================

// Include the database connection
include "db.php";

// Get the search term from the URL (?q=something)
$searchTerm = isset($_GET['q']) ? trim($_GET['q']) : "";

// -----------------------------------------------------------
// Fetch History Records that match the search term
// -----------------------------------------------------------
// We search across Date, From Zone, To Zone, and Input Time
// using LIKE, and use a prepared statement to stay safe.
$sql = "SELECT * FROM conversion_history 
        WHERE input_date LIKE ? 
        OR input_time LIKE ? 
        OR from_timezone LIKE ? 
        OR to_timezone LIKE ?
        ORDER BY created_at DESC";

$likeTerm = "%" . $searchTerm . "%";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $likeTerm, $likeTerm, $likeTerm, $likeTerm);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

include "includes/header.php";
include "includes/navbar.php";
?>

<section class="section-block">
    <div class="container">
        <h2 class="text-center fw-bold mb-4"><i class="bi bi-search"></i> Search Results</h2>
        <p class="text-center text-muted">Showing results for: "<?php echo htmlspecialchars($searchTerm); ?>"</p>

        <div class="text-center mb-3">
            <a href="index.php#history" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Back to Full History
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Input Time</th>
                        <th>From Zone</th>
                        <th>To Zone</th>
                        <th>Converted Time</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['input_date'] . "</td>";
                            echo "<td>" . $row['input_time'] . "</td>";
                            echo "<td>" . $row['from_timezone'] . "</td>";
                            echo "<td>" . $row['to_timezone'] . "</td>";
                            echo "<td>" . $row['converted_datetime'] . "</td>";
                            echo "<td>" . $row['created_at'] . "</td>";
                            echo "<td>
                                    <a href='delete.php?id=" . $row['id'] . "' class='btn btn-sm btn-outline-danger'>
                                        <i class='bi bi-x-circle'></i> Delete
                                    </a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No matching records found.</td></tr>";
                    }
                    mysqli_stmt_close($stmt);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include "includes/footer.php"; ?>
