<?php
require 'db.php';

if (!isset($_GET['id'])) {
    die("Invalid Request");
}

$id = $_GET['id'];

// Fetch existing task
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");
$stmt->execute(['id' => $id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$task) {
    die("Task not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];

    $stmt = $pdo->prepare("UPDATE tasks SET title = :title WHERE id = :id");
    $stmt->execute(['title' => $title, 'id' => $id]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form method="post">
        <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
