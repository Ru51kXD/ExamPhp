<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список дел</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <h1>Список дел</h1>
        <form action="/add.php" method="post">
            <input type="text" name="task" id="task" placeholder="Нужно сделать.." class="form-control">
            <input type="date" name="deadline" id="deadline">
            <input type="checkbox" name="urgent" id="urgent">
            <label for="urgent">Срочно</label>
            <button type="submit" name="sendTask" class="btn btn-success">Отправить</button>
        </form>


        <?php
        require 'configDB.php';

        echo '<ul class="list-group" id="taskList">';
        $stmt = $pdo->query('SELECT * FROM tasks ORDER BY id DESC');
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            $deadline = $row->deadline ? date('d.m.Y', strtotime($row->deadline)) : 'Нет дедлайна';
            $urgentLabel = $row->urgent ? 'Срочно' : 'Не срочно';
            $completedClass = $row->completed ? 'completed' : '';

            echo '<li class="list-group-item ' . $completedClass . '" data-task-id="' . htmlspecialchars($row->id) . '">';
            echo '<span><strong>' . htmlspecialchars($row->task) . '</strong></span>';
            echo '<div>Дедлайн: ' . $deadline . '</div>';
            echo '<div>' . $urgentLabel . '</div>';
            echo '<div>';
            echo '<button class="btn btn-info btn-sm complete-btn">Выполнено</button> ';
            echo '<button class="btn btn-danger btn-sm delete-btn">Удалить</button>';
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>';
        ?>
    </div>

    <div class="col-md-4">
        <h2>Выполненные задачи</h2>
        <ul class="list-group" id="completedTasksList">
            <!-- Здесь будут отображаться выполненные задачи -->
        </ul>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var taskList = document.getElementById('taskList');
            var completedTasksPanel = document.getElementById('completedTasksPanel');
            var completedTasksList = document.getElementById('completedTasksList');

            taskList.addEventListener('click', function (event) {
                if (event.target.classList.contains('complete-btn')) {
                    var card = event.target.closest('.list-group-item');
                    card.classList.add('completed');
                    completedTasksList.appendChild(card);
                    event.target.disabled = true;
                }

                if (event.target.classList.contains('delete-btn')) {
                    var card = event.target.closest('.list-group-item');
                    card.remove();
                }
            });
        });
    </script>

</body>

</html>