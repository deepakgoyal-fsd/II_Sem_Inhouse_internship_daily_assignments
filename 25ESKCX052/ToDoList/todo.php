<?php
include('checkTodo.php');
include('header.php');

$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

if ($filter === 'active') {
    $result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id = $user_id AND completed = 0 ORDER BY id DESC");
} elseif ($filter === 'completed') {
    $result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id = $user_id AND completed = 1 ORDER BY id DESC");
} else {
    $result = mysqli_query($conn, "SELECT * FROM tasks WHERE user_id = $user_id ORDER BY completed ASC, id DESC");
}

$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container">
    <div class="todo-app">
        <h1 id="app-title">To-Do App</h1>

        <div class="user-bar">
            <span>Hi, <?php echo $_SESSION['user_name']; ?> </span>
            <a href="logout.php">Logout</a>
        </div>

        <div class="filter-bar">
            <a href="todo.php?filter=all" class="<?php echo $filter === 'all' ? 'active' : ''; ?>">All</a>
            <a href="todo.php?filter=active" class="<?php echo $filter === 'active' ? 'active' : ''; ?>">Active</a>
            <a href="todo.php?filter=completed" class="<?php echo $filter === 'completed' ? 'active' : ''; ?>">Completed</a>
        </div>

        <form class="input-area" action="" method="post" id="add-form">
            <input type="text" name="task" id="task-input" placeholder="Add a new task..." required>
            <button type="submit" name="add_task"><i class="fa-solid fa-plus"></i></button>
        </form>

        <div class="todos-container">
            <ul id="task-list">
                <?php if (empty($tasks)): ?>
                    <div class="empty-state">No tasks here. Add one!</div>
                <?php endif; ?>

                <?php foreach ($tasks as $task): ?>
                <li class="<?php echo $task['completed'] ? 'completed' : ''; ?>" data-id="<?php echo $task['id']; ?>" data-task="<?php echo htmlspecialchars($task['task']); ?>">
                    <form action="" method="post" style="display:contents;">
                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                        <input type="hidden" name="current_status" value="<?php echo $task['completed']; ?>">
                        <input type="checkbox" class="checkbox" name="toggle_task" onclick="this.form.submit()" <?php echo $task['completed'] ? 'checked' : ''; ?>>
                    </form>
                    <span><?php echo htmlspecialchars($task['task']); ?></span>
                    <div class="task-buttons">
                        <button class="edit-btn" onclick="editTask(this)" title="Edit"><i class="fa-solid fa-pen"></i></button>
                        <form action="" method="post" style="display:inline;">
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <button type="submit" name="delete_task" class="delete-btn" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
