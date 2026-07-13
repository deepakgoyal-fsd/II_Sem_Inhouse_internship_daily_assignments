<?php
include('checkNotes.php');
include('header.php');

$result = mysqli_query($conn, "SELECT * FROM notes WHERE user_id = $user_id ORDER BY id DESC");
$notes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container">
    <div class="topbar">
        <h1><img src="images/notes.png" alt="Notes">Slice Of Life</h1>
        <div class="user-info">
            <span>Hi, <?php echo $_SESSION['user_name']; ?></span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <button onclick="openModal()"><img src="images/edit1.png" alt="Create Note">Create Note</button>

    <div class="notes-grid" id="notesGrid">
        <?php foreach ($notes as $note): ?>
        <div class="note-card">
            <h3><?php echo $note['title']; ?></h3>
            <p><?php echo nl2br($note['content']); ?></p>
            <form action="" method="post">
                <input type="hidden" name="note_id" value="<?php echo $note['id']; ?>">
                <button type="submit" name="delete_note" class="delete-btn">
                    <img src="images/delete.png" alt="Delete">
                </button>
            </form>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal-overlay" id="modalOverlay">
    <div class="modal-box">
        <h2>New Note</h2>
        <form action="" method="post">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="content" placeholder="Write your note..." rows="5" required></textarea>
            <div class="modal-buttons">
                <button type="submit" name="add_note">Save Note</button>
                <button type="button" onclick="closeModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script src="script.js"></script>
<?php include('footer.php'); ?>
