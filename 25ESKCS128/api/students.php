<?php
// api/students.php — REST API: list, get, create, update, delete
// GET    students.php          -> list all students
// GET    students.php?id=5     -> get one student
// POST   students.php          -> create a student (JSON body)
// PUT    students.php?id=5     -> update a student (JSON body, full/partial)
// DELETE students.php?id=5     -> delete a student

header('Content-Type: application/json');

require __DIR__ . '/db.php';

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

$validStatuses = ['Active', 'OnLeave', 'Graduated'];
$requiredFields = ['name', 'roll', 'dept', 'year', 'status', 'gpa', 'email'];

function respond($code, $data) {
    http_response_code($code);
    echo json_encode($data);
    exit;
}

function readJsonBody() {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        respond(400, ['error' => 'Invalid JSON body']);
    }
    return $data ?? [];
}

function validatePayload($payload, $validStatuses, $requiredFields, $partial = false) {
    if (!$partial) {
        foreach ($requiredFields as $f) {
            if (!array_key_exists($f, $payload) || $payload[$f] === '' || $payload[$f] === null) {
                return "Missing required field: $f";
            }
        }
    }
    if (isset($payload['status']) && !in_array($payload['status'], $validStatuses, true)) {
        return "Invalid status. Must be one of: " . implode(', ', $validStatuses);
    }
    if (isset($payload['gpa']) && (!is_numeric($payload['gpa']) || $payload['gpa'] < 0 || $payload['gpa'] > 10)) {
        return "GPA must be a number between 0 and 10";
    }
    if (isset($payload['year']) && (!is_numeric($payload['year']) || $payload['year'] < 1 || $payload['year'] > 4)) {
        return "Year must be a number between 1 and 4";
    }
    if (isset($payload['email']) && !filter_var($payload['email'], FILTER_VALIDATE_EMAIL)) {
        return "Invalid email address";
    }
    return null;
}

switch ($method) {

    case 'GET':
        if ($id) {
            $stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
            $stmt->execute([$id]);
            $student = $stmt->fetch();
            if (!$student) {
                respond(404, ['error' => 'Student not found']);
            }
            respond(200, $student);
        } else {
            $stmt = $pdo->query('SELECT * FROM students ORDER BY name ASC');
            respond(200, $stmt->fetchAll());
        }
        break;

    case 'POST':
        $payload = readJsonBody();
        $err = validatePayload($payload, $validStatuses, $requiredFields, false);
        if ($err) {
            respond(400, ['error' => $err]);
        }

        // check for duplicate roll number
        $check = $pdo->prepare('SELECT id FROM students WHERE roll = ?');
        $check->execute([$payload['roll']]);
        if ($check->fetch()) {
            respond(409, ['error' => 'A student with this roll number already exists']);
        }

        $stmt = $pdo->prepare(
            'INSERT INTO students (name, roll, dept, year, status, gpa, email, phone)
             VALUES (:name, :roll, :dept, :year, :status, :gpa, :email, :phone)'
        );
        $stmt->execute([
            ':name'   => $payload['name'],
            ':roll'   => $payload['roll'],
            ':dept'   => $payload['dept'],
            ':year'   => $payload['year'],
            ':status' => $payload['status'],
            ':gpa'    => $payload['gpa'],
            ':email'  => $payload['email'],
            ':phone'  => $payload['phone'] ?? null,
        ]);

        $newId = $pdo->lastInsertId();
        $stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
        $stmt->execute([$newId]);
        respond(201, $stmt->fetch());
        break;

    case 'PUT':
        if (!$id) {
            respond(400, ['error' => 'Missing id parameter']);
        }
        $stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
        $stmt->execute([$id]);
        $existing = $stmt->fetch();
        if (!$existing) {
            respond(404, ['error' => 'Student not found']);
        }

        $payload = readJsonBody();
        $err = validatePayload($payload, $validStatuses, $requiredFields, true);
        if ($err) {
            respond(400, ['error' => $err]);
        }

        // if roll is changing, make sure it doesn't collide with another record
        if (isset($payload['roll']) && $payload['roll'] !== $existing['roll']) {
            $check = $pdo->prepare('SELECT id FROM students WHERE roll = ? AND id != ?');
            $check->execute([$payload['roll'], $id]);
            if ($check->fetch()) {
                respond(409, ['error' => 'A student with this roll number already exists']);
            }
        }

        $fields = ['name', 'roll', 'dept', 'year', 'status', 'gpa', 'email', 'phone'];
        $merged = array_merge($existing, array_intersect_key($payload, array_flip($fields)));

        $stmt = $pdo->prepare(
            'UPDATE students
             SET name = :name, roll = :roll, dept = :dept, year = :year,
                 status = :status, gpa = :gpa, email = :email, phone = :phone
             WHERE id = :id'
        );
        $stmt->execute([
            ':name'   => $merged['name'],
            ':roll'   => $merged['roll'],
            ':dept'   => $merged['dept'],
            ':year'   => $merged['year'],
            ':status' => $merged['status'],
            ':gpa'    => $merged['gpa'],
            ':email'  => $merged['email'],
            ':phone'  => $merged['phone'],
            ':id'     => $id,
        ]);

        $stmt = $pdo->prepare('SELECT * FROM students WHERE id = ?');
        $stmt->execute([$id]);
        respond(200, $stmt->fetch());
        break;

    case 'DELETE':
        if (!$id) {
            respond(400, ['error' => 'Missing id parameter']);
        }
        $stmt = $pdo->prepare('SELECT id FROM students WHERE id = ?');
        $stmt->execute([$id]);
        if (!$stmt->fetch()) {
            respond(404, ['error' => 'Student not found']);
        }
        $stmt = $pdo->prepare('DELETE FROM students WHERE id = ?');
        $stmt->execute([$id]);
        respond(200, ['success' => true, 'deleted_id' => $id]);
        break;

    default:
        respond(405, ['error' => 'Method not allowed']);
}
