<script>
    // Получаем все кнопки "Выполнено"
    var completeButtons = document.querySelectorAll('.complete-btn');

    // Добавляем обработчик события для каждой кнопки
    completeButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            // Получаем родительский элемент (карточку) кнопки
            var card = event.target.closest('.list-group-item');

            // Добавляем класс completed к карточке
            card.classList.add('completed');

            // Предотвращаем переход по ссылке (так как кнопка является ссылкой)
            event.preventDefault();
        });
    });
</script>
