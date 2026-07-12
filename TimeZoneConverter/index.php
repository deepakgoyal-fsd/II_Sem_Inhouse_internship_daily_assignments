<?php
// =========================================================
// INDEX.PHP - MAIN PAGE OF THE PROJECT
// =========================================================
// This is the homepage. It includes the header, navbar and
// footer, and displays all the main sections:
// Home, Converter, Current Time, and History.
// =========================================================

// Include the database connection (needed to fetch history)
include "db.php";

// Include the common header (contains <head>, Bootstrap links)
include "includes/header.php";

// Include the navbar
include "includes/navbar.php";

// -----------------------------------------------------------
// Fetch History Records to display in the table
// -----------------------------------------------------------
// We select all records, newest first
$sql = "SELECT * FROM conversion_history ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!-- =========================================================
     HOME SECTION
========================================================= -->
<section id="home" class="section-block">
    <div class="container text-center">
        <h1 class="fw-bold">Time Zone Converter</h1>
        <p class="lead">A simple tool to convert date & time between different time zones around the world.</p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-4 col-sm-6">
                <div class="card info-card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-calendar-date"></i> Current Date</h5>
                        <p class="card-text fs-4" id="currentDate">--</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card info-card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-clock"></i> Current Time</h5>
                        <p class="card-text fs-4" id="currentTimeClock">--</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     TIME ZONE CONVERTER SECTION
========================================================= -->
<section id="converter" class="section-block bg-alt">
    <div class="container">
        <h2 class="text-center fw-bold mb-4"><i class="bi bi-arrow-left-right"></i> Convert Time Zone</h2>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card p-4">

                    <!-- Conversion Form -->
                    <!-- We use method="POST" and action="convert.php" so PHP can process it -->
                    <form id="converterForm" action="convert.php" method="POST">

                        <div class="row g-3">

                            <!-- Date Picker -->
                            <div class="col-md-6">
                                <label for="inputDate" class="form-label">Date</label>
                                <input type="date" class="form-control" id="inputDate" name="inputDate">
                                <div class="invalid-feedback">Please select a date.</div>
                            </div>

                            <!-- Time Picker -->
                            <div class="col-md-6">
                                <label for="inputTime" class="form-label">Time</label>
                                <input type="time" class="form-control" id="inputTime" name="inputTime">
                                <div class="invalid-feedback">Please select a time.</div>
                            </div>

                            <!-- From Time Zone Dropdown -->
                            <div class="col-md-6">
                                <label for="fromTimezone" class="form-label">From Time Zone</label>
                                <select class="form-select" id="fromTimezone" name="fromTimezone">
                                    <option value="">-- Select Time Zone --</option>
                                    <option value="Asia/Kolkata">Asia/Kolkata (IST)</option>
                                    <option value="America/New_York">America/New_York (EST)</option>
                                    <option value="Europe/London">Europe/London (GMT)</option>
                                    <option value="Asia/Tokyo">Asia/Tokyo (JST)</option>
                                    <option value="Australia/Sydney">Australia/Sydney (AEST)</option>
                                    <option value="Asia/Dubai">Asia/Dubai (GST)</option>
                                    <option value="UTC">UTC</option>
                                </select>
                                <div class="invalid-feedback">Please select the "From" time zone.</div>
                            </div>

                            <!-- To Time Zone Dropdown -->
                            <div class="col-md-6">
                                <label for="toTimezone" class="form-label">To Time Zone</label>
                                <select class="form-select" id="toTimezone" name="toTimezone">
                                    <option value="">-- Select Time Zone --</option>
                                    <option value="Asia/Kolkata">Asia/Kolkata (IST)</option>
                                    <option value="America/New_York">America/New_York (EST)</option>
                                    <option value="Europe/London">Europe/London (GMT)</option>
                                    <option value="Asia/Tokyo">Asia/Tokyo (JST)</option>
                                    <option value="Australia/Sydney">Australia/Sydney (AEST)</option>
                                    <option value="Asia/Dubai">Asia/Dubai (GST)</option>
                                    <option value="UTC">UTC</option>
                                </select>
                                <div class="invalid-feedback">Please select the "To" time zone.</div>
                            </div>

                        </div>

                        <!-- Convert Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="bi bi-arrow-repeat"></i> Convert
                            </button>
                        </div>
                    </form>

                </div>

                <!-- Result Card (shown only after conversion happens via PHP) -->
                <?php
                    // Check if convert.php sent back a result using the URL
                    $showResult = isset($_GET['result']) && $_GET['result'] == 1;
                    $resultCardClass = $showResult ? "result-card" : "result-card d-none";
                ?>
                <div id="resultCard" class="card mt-4 p-4 text-center <?php echo $resultCardClass; ?>">
                    <h5><i class="bi bi-check-circle-fill text-success"></i> Conversion Result</h5>
                    <p class="mb-1">Converted Date: <strong id="resultDate"><?php echo $showResult ? htmlspecialchars($_GET['date']) : "--"; ?></strong></p>
                    <p class="mb-1">Converted Time: <strong id="resultTime"><?php echo $showResult ? htmlspecialchars($_GET['time']) : "--"; ?></strong></p>
                    <p class="mb-0">Time Zone: <strong id="resultZone"><?php echo $showResult ? htmlspecialchars($_GET['zone']) : "--"; ?></strong></p>
                </div>

                <!-- Error message if validation failed on the server side -->
                <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
                <div class="alert alert-danger mt-3 text-center">
                    Please fill in all fields before converting.
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     CURRENT TIME SECTION
========================================================= -->
<section id="currentTime" class="section-block">
    <div class="container">
        <h2 class="text-center fw-bold mb-4"><i class="bi bi-globe"></i> Current Time in Any Zone</h2>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-4 text-center">
                    <label for="zoneSelect" class="form-label">Select Time Zone</label>
                    <select class="form-select mb-3" id="zoneSelect">
                        <option value="Asia/Kolkata">Asia/Kolkata (IST)</option>
                        <option value="America/New_York">America/New_York (EST)</option>
                        <option value="Europe/London">Europe/London (GMT)</option>
                        <option value="Asia/Tokyo">Asia/Tokyo (JST)</option>
                        <option value="Australia/Sydney">Australia/Sydney (AEST)</option>
                        <option value="Asia/Dubai">Asia/Dubai (GST)</option>
                        <option value="UTC">UTC</option>
                    </select>
                    <h3 id="liveZoneTime" class="fw-bold">--:--:--</h3>
                    <p class="text-muted small">This updates automatically using your device clock (JavaScript only, no server calls).</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================
     CONVERSION HISTORY SECTION
========================================================= -->
<section id="history" class="section-block bg-alt">
    <div class="container">
        <h2 class="text-center fw-bold mb-4"><i class="bi bi-table"></i> Conversion History</h2>

        <!-- Search Box -->
        <div class="row mb-3">
            <div class="col-md-6 mx-auto">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" id="searchBox" class="form-control" placeholder="Search by date, time zone or time...">
                </div>
            </div>
        </div>

        <!-- Clear All Button -->
        <div class="text-end mb-3">
            <button id="clearAllBtn" class="btn btn-danger">
                <i class="bi bi-trash3-fill"></i> Clear All History
            </button>
        </div>

        <!-- History Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center" id="historyTable">
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
                    // -----------------------------------------------------------
                    // Loop through the results and print each row of the table
                    // -----------------------------------------------------------
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr data-id='" . $row['id'] . "'>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['input_date'] . "</td>";
                            echo "<td>" . $row['input_time'] . "</td>";
                            echo "<td>" . $row['from_timezone'] . "</td>";
                            echo "<td>" . $row['to_timezone'] . "</td>";
                            echo "<td>" . $row['converted_datetime'] . "</td>";
                            echo "<td>" . $row['created_at'] . "</td>";
                            echo "<td>
                                    <button class='btn btn-sm btn-outline-danger delete-btn' data-id='" . $row['id'] . "'>
                                        <i class='bi bi-x-circle'></i> Delete
                                    </button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No history found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
// Include the common footer (contains scripts and closing tags)
include "includes/footer.php";
?>
