<?php
require 'db.php';

// Fetch tasks
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
</head>
<body>
    <h1>Task Manager</h1>
    <a href="add.php">Add Task</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['id']) ?></td>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td>
                <a href="edit.php?id=<?= $task['id'] ?>">Edit</a> | 
                <a href="delete.php?id=<?= $task['id'] ?>" onclick="return confirm('Delete this task?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
