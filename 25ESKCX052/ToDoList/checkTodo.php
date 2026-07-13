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

    if (isset($_POST['add_task'])) {
        $task = mysqli_real_escape_string($conn, $_POST['task']);
        $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);
        $priority = mysqli_real_escape_string($conn, $_POST['priority']);
        if (!empty($task)) {
            mysqli_query($conn, "INSERT INTO tasks (user_id, task, due_date, priority) VALUES ($user_id, '$task', '$due_date', '$priority')");
        }
        header("Location: todo.php");
        exit();
    }

    if (isset($_POST['delete_task'])) {
        $task_id = intval($_POST['task_id']);
        mysqli_query($conn, "DELETE FROM tasks WHERE id = $task_id AND user_id = $user_id");
        header("Location: todo.php");
        exit();
    }

    if (isset($_POST['toggle_task'])) {
        $task_id = intval($_POST['task_id']);
        $current = intval($_POST['current_status']);
        $new_status = $current === 1 ? 0 : 1;
        mysqli_query($conn, "UPDATE tasks SET completed = $new_status WHERE id = $task_id AND user_id = $user_id");
        header("Location: todo.php");
        exit();
    }

    if (isset($_POST['delete_completed'])) {
        mysqli_query($conn, "DELETE FROM tasks WHERE user_id = $user_id AND completed = 1");
        header("Location: todo.php");
        exit();
    }

    if (isset($_POST['edit_task'])) {
        $task_id = intval($_POST['task_id']);
        $task = mysqli_real_escape_string($conn, $_POST['task']);
        if (!empty($task)) {
            mysqli_query($conn, "UPDATE tasks SET task = '$task' WHERE id = $task_id AND user_id = $user_id");
        }
        header("Location: todo.php");
        exit();
    }
}
?>
