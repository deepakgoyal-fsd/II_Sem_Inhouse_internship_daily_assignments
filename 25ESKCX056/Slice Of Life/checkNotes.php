<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('db_connect.php');

if (empty($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = intval($_SESSION['user_id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_note'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        if (!empty($title) && !empty($content)) {
            mysqli_query($conn, "INSERT INTO notes (user_id, title, content) VALUES ($user_id, '$title', '$content')");
        }
        header("Location: notes.php");
        exit();
    }

    if (isset($_POST['delete_note'])) {
        $note_id = intval($_POST['note_id']);
        mysqli_query($conn, "DELETE FROM notes WHERE id = $note_id AND user_id = $user_id");
        header("Location: notes.php");
        exit();
    }
}
?>
