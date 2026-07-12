<?php
require_once 'config.php';

// Ensure user is authenticated. This function returns the user's ID or terminates.
$user_id = requireAuth();

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // READ (Fetch) Bookmarks
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $category = isset($_GET['category']) ? trim($_GET['category']) : '';

    try {
        $query = "SELECT * FROM bookmarks WHERE user_id = :user_id";
        $params = [':user_id' => $user_id];

        if (!empty($search)) {
            $query .= " AND (title LIKE :search OR url LIKE :search)";
            $params[':search'] = '%' . $search . '%';
        }

        if (!empty($category) && $category !== 'All') {
            $query .= " AND category = :category";
            $params[':category'] = $category;
        }

        $query .= " ORDER BY created_at DESC";

        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        $bookmarks = $stmt->fetchAll();

        // Get count of bookmarks in each category for filters
        $catStmt = $pdo->prepare("SELECT category, COUNT(*) as count FROM bookmarks WHERE user_id = :user_id GROUP BY category");
        $catStmt->execute([':user_id' => $user_id]);
        $categoriesCount = $catStmt->fetchAll();

        sendResponse("success", "Bookmarks fetched successfully.", [
            "bookmarks" => $bookmarks,
            "categoriesCount" => $categoriesCount,
            "user" => [
                "username" => $_SESSION['username'] ?? 'User',
                "email" => $_SESSION['email'] ?? 'user@example.com'
            ]
        ]);

    } catch (PDOException $e) {
        sendResponse("error", "Database error: " . $e->getMessage(), null, 500);
    }

} elseif ($method === 'POST') {
    // CREATE, UPDATE, or DELETE Bookmarks (Determined by action parameter)
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    // Check JSON payload if not found in $_POST (alternative input stream)
    if (empty($action)) {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        if ($data) {
            $action = isset($data['action']) ? $data['action'] : '';
            $_POST = $data; // Populate $_POST from JSON for ease of use below
        }
    }

    if (empty($action)) {
        sendResponse("error", "Action is required for POST requests.", null, 400);
    }

    if ($action === 'create') {
        // CREATE
        $title = isset($_POST['title']) ? trim($_POST['title']) : '';
        $url = isset($_POST['url']) ? trim($_POST['url']) : '';
        $category = isset($_POST['category']) ? trim($_POST['category']) : '';

        // Validation
        if (empty($title) || empty($url) || empty($category)) {
            sendResponse("error", "All fields (title, url, category) are required.", null, 400);
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            sendResponse("error", "Please enter a valid URL (including http:// or https://).", null, 400);
        }

        try {
            $stmt = $pdo->prepare("INSERT INTO bookmarks (user_id, title, url, category) VALUES (:user_id, :title, :url, :category)");
            $stmt->execute([
                ':user_id' => $user_id,
                ':title' => $title,
                ':url' => $url,
                ':category' => $category
            ]);

            sendResponse("success", "Bookmark added successfully.", [
                "id" => $pdo->lastInsertId()
            ], 201);

        } catch (PDOException $e) {
            sendResponse("error", "Database error: " . $e->getMessage(), null, 500);
        }

    } elseif ($action === 'update') {
        // UPDATE
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $title = isset($_POST['title']) ? trim($_POST['title']) : '';
        $url = isset($_POST['url']) ? trim($_POST['url']) : '';
        $category = isset($_POST['category']) ? trim($_POST['category']) : '';

        if (!$id || empty($title) || empty($url) || empty($category)) {
            sendResponse("error", "All fields (id, title, url, category) are required.", null, 400);
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            sendResponse("error", "Please enter a valid URL (including http:// or https://).", null, 400);
        }

        try {
            // Verify bookmark ownership first
            $checkStmt = $pdo->prepare("SELECT id FROM bookmarks WHERE id = :id AND user_id = :user_id");
            $checkStmt->execute([':id' => $id, ':user_id' => $user_id]);
            if (!$checkStmt->fetch()) {
                sendResponse("error", "Bookmark not found or access denied.", null, 403);
            }

            // Update record
            $stmt = $pdo->prepare("UPDATE bookmarks SET title = :title, url = :url, category = :category WHERE id = :id AND user_id = :user_id");
            $stmt->execute([
                ':title' => $title,
                ':url' => $url,
                ':category' => $category,
                ':id' => $id,
                ':user_id' => $user_id
            ]);

            sendResponse("success", "Bookmark updated successfully.");

        } catch (PDOException $e) {
            sendResponse("error", "Database error: " . $e->getMessage(), null, 500);
        }

    } elseif ($action === 'delete') {
        // DELETE
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

        if (!$id) {
            sendResponse("error", "Bookmark ID is required.", null, 400);
        }

        try {
            // Verify bookmark ownership first
            $checkStmt = $pdo->prepare("SELECT id FROM bookmarks WHERE id = :id AND user_id = :user_id");
            $checkStmt->execute([':id' => $id, ':user_id' => $user_id]);
            if (!$checkStmt->fetch()) {
                sendResponse("error", "Bookmark not found or access denied.", null, 403);
            }

            // Delete record
            $stmt = $pdo->prepare("DELETE FROM bookmarks WHERE id = :id AND user_id = :user_id");
            $stmt->execute([':id' => $id, ':user_id' => $user_id]);

            sendResponse("success", "Bookmark deleted successfully.");

        } catch (PDOException $e) {
            sendResponse("error", "Database error: " . $e->getMessage(), null, 500);
        }

    } else {
        sendResponse("error", "Invalid action.", null, 400);
    }
} else {
    sendResponse("error", "Method not allowed.", null, 405);
}
