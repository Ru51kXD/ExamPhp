<?php
require 'configDB.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);  // Валидация и конвертация в целое число

    if ($id > 0) {  // Убедитесь, что ID является положительным числом
        $sql = 'UPDATE tasks SET completed = 1 WHERE id = ?';
        $query = $pdo->prepare($sql);
        
        try {
            $query->execute([$id]);
            header('Location: /index.php');
            exit;
        } catch (PDOException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    } else {
        echo "Неверный ID задачи.";
    }
} else {
    echo "ID задачи не передан.";
}
?>
