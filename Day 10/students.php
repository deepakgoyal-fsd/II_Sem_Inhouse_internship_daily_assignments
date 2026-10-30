<?php
$page = "students";
include 'header.php';
?>
<div class="container-fluid py-5 px-4">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h2 class="mb-0 fw-bold"><i class="fas fa-users text-primary"></i> Registered Students</h2>
        </div>
        <div class="col text-end">
            <?php include 'db_connect.php'; ?>
        </div>
    </div>
    <div class="table-responsive table-custom">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark py-3">
                <tr>
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3">Photo</th>
                    <th class="py-3">Name</th>
                    <th class="py-3">Contact Info</th>
                    <th class="py-3">Location</th>
                    <th class="py-3">Academics</th>
                    <th class="py-3">CGPA</th>
                    <th class="py-3">Registered On</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM students ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cgpaClass = ($row['cgpa'] > 8.0) ? 'table-success-custom' : '';
                        $cgpaBadge = ($row['cgpa'] > 8.0) ? 'bg-success' : 'bg-secondary';

                        echo "<tr class='{$cgpaClass}'>";
                        echo "<td class='px-4 fw-bold text-muted'>#{$row['id']}</td>";
                        echo "<td>
              <div class='bg-light border rounded-circle d-flex align-items-center justify-content-center text-muted' style='width: 45px; height: 45px; font-size: 0.8rem;'>
              <i class='fas fa-user'></i>
              </div>
              <small class='d-block text-muted mt-1' style='font-size: 0.7rem;'>" . htmlspecialchars($row['photo']) . "</small>
              </td>";
                        echo "<td class='fw-bold'>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>
              <div style='font-size: 0.9rem;'><i class='fas fa-envelope text-muted me-1'></i> " . htmlspecialchars($row['email']) . "</div>
              <div style='font-size: 0.9rem;'><i class='fas fa-phone text-muted me-1'></i> " . htmlspecialchars($row['phone']) . "</div>
              </td>";
                        echo "<td>
              <div style='font-size: 0.9rem;'><i class='fas fa-city text-muted me-1'></i> " . htmlspecialchars($row['city']) . "</div>
              <div style='font-size: 0.85rem; max-width: 150px;' class='text-truncate text-muted' title='" . htmlspecialchars($row['address']) . "'>" . htmlspecialchars($row['address']) . "</div>
              </td>";
                        echo "<td>
              <span class='badge bg-info text-dark mb-1'>" . htmlspecialchars($row['course']) . "</span><br>
              <small class='text-muted'>" . htmlspecialchars($row['branch']) . "</small>
              </td>";
                        echo "<td><span class='badge {$cgpaBadge} fs-6'>" . htmlspecialchars($row['cgpa']) . "</span></td>";

                        $dateFormatted = date('M j, Y h:i A', strtotime($row['created_at']));
                        echo "<td class='text-muted' style='font-size: 0.85rem;'>{$dateFormatted}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center py-5 text-muted'>
          <i class='fas fa-folder-open fa-3x mb-3 opacity-50'></i>
          <h4>No students registered yet.</h4>
          </td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="mt-4 text-end">
        <?php
        $totalRows = mysqli_num_rows($result);
        echo "<div class='badge bg-dark fs-5 py-2 px-4 shadow-sm'><i class='fas fa-chart-bar me-2'></i> Total Students: {$totalRows}</div>";
        ?>
    </div>
</div>
<?php include 'footer.php'; ?>