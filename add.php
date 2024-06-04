<?php
require 'configDB.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
    $task = trim($_POST['task']);
    $deadline = !empty($_POST['deadline']) ? $_POST['deadline'] : null;
    $urgent = isset($_POST['urgent']) ? 1 : 0;

    if ($task !== '') {
        $stmt = $pdo->prepare('INSERT INTO tasks (task, deadline, urgent) VALUES (?, ?, ?)');
        $stmt->execute([$task, $deadline, $urgent]);
    }
}

header('Location: /index.php');
exit;
?>