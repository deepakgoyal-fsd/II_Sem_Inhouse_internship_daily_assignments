<?php
$file = "students.json";

if (!file_exists($file)) {
    file_put_contents($file, "[]");
}

$students = json_decode(file_get_contents($file), true);
$message = "";

function saveData($students, $file) {
    file_put_contents($file, json_encode($students, JSON_PRETTY_PRINT));
}

function getNextId($students) {
    $maxId = 0;

    foreach ($students as $student) {
        if ($student["id"] > $maxId) {
            $maxId = $student["id"];
        }
    }

    return $maxId + 1;
}

$editStudent = null;

if (isset($_GET["edit"])) {
    $editId = $_GET["edit"];

    foreach ($students as $student) {
        if ($student["id"] == $editId) {
            $editStudent = $student;
            break;
        }
    }
}

if (isset($_POST["add"])) {
    $newStudent = [
        "id" => getNextId($students),
        "name" => $_POST["name"],
        "email" => $_POST["email"],
        "branch" => $_POST["branch"]
    ];

    $students[] = $newStudent;
    saveData($students, $file);
    $message = "Student added successfully.";
}

if (isset($_POST["update"])) {
    $id = $_POST["id"];

    foreach ($students as $key => $student) {
        if ($student["id"] == $id) {
            $students[$key]["name"] = $_POST["name"];
            $students[$key]["email"] = $_POST["email"];
            $students[$key]["branch"] = $_POST["branch"];
            break;
        }
    }

    saveData($students, $file);
    $message = "Student updated successfully.";
    $editStudent = null;
}

if (isset($_GET["delete"])) {
    $deleteId = $_GET["delete"];

    foreach ($students as $key => $student) {
        if ($student["id"] == $deleteId) {
            unset($students[$key]);
            break;
        }
    }

    $students = array_values($students);
    saveData($students, $file);
    $message = "Student deleted successfully.";
}

$search = "";

if (isset($_GET["search"])) {
    $search = $_GET["search"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Student CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Student Management System</h1>

        <?php if ($message != "") { ?>
            <div class="message"><?php echo $message; ?></div>
        <?php } ?>

        <div class="search-box">
            <form method="GET">
                <input type="text" name="search" placeholder="Search by name, email or branch" value="<?php echo $search; ?>">
                <button type="submit">Search</button>
                <a class="btn" href="index.php">Clear</a>
            </form>
        </div>

        <h2><?php echo $editStudent ? "Edit Student" : "Add Student"; ?></h2>

        <form method="POST">
            <?php if ($editStudent) { ?>
                <input type="hidden" name="id" value="<?php echo $editStudent['id']; ?>">
            <?php } ?>

            <input type="text" name="name" placeholder="Student Name" required value="<?php echo $editStudent ? $editStudent['name'] : ''; ?>">
            <input type="email" name="email" placeholder="Email" required value="<?php echo $editStudent ? $editStudent['email'] : ''; ?>">
            <input type="text" name="branch" placeholder="Branch" required value="<?php echo $editStudent ? $editStudent['branch'] : ''; ?>">

            <?php if ($editStudent) { ?>
                <button type="submit" name="update">Update Student</button>
                <a class="btn" href="index.php">Cancel</a>
            <?php } else { ?>
                <button type="submit" name="add">Add Student</button>
            <?php } ?>
        </form>

        <h2>Student Records</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Branch</th>
                <th>Action</th>
            </tr>

            <?php
            foreach ($students as $student) {
                $text = strtolower($student["name"] . $student["email"] . $student["branch"]);

                if ($search == "" || strpos($text, strtolower($search)) !== false) {
            ?>
                <tr>
                    <td><?php echo $student["id"]; ?></td>
                    <td><?php echo $student["name"]; ?></td>
                    <td><?php echo $student["email"]; ?></td>
                    <td><?php echo $student["branch"]; ?></td>
                    <td>
                        <a class="btn edit" href="index.php?edit=<?php echo $student['id']; ?>">Edit</a>
                        <a class="btn delete" href="index.php?delete=<?php echo $student['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</body>
</html>
