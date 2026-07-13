<form method="GET" action="students.php" class="d-flex mb-3">

    <input
        type="search"
        name="q"
        class="form-control me-2"
        placeholder="Search by name, branch or course..."
        value="<?= htmlspecialchars($search) ?>"
    >

    <button class="btn btn-primary" type="submit">
        <i class="bi bi-search"></i> Search
    </button>

</form>

<!-- Show result count -->
<?php if ($search): ?>

<p class="text-muted">
    Results for:
    <strong><?= htmlspecialchars($search) ?></strong>
    (RowCount() found)
</p>

<?php endif; ?>
