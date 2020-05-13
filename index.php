<?php
// Подключение библиотек
require_once __DIR__.'/helpers.php';
require_once __DIR__.'/functions.php';

// Назначение title
$title = "Дела в порядке";
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
// Определяем пользователя. Пока по умолчанию 1
$user_id = 1;


// Подключение к БД
$con = connect_db();

// Получение значения текущего id проекта
$current_project_id = $_GET['project_id'] ?? 0;
// Проверка на корректность id проекта. Если не корректный, то возвращаем код 404
if ($current_project_id) {
    if (!validate_project_id($current_project_id, $con)) {
        http_response_code(404);
        exit;
    }
}


// Получение списка проектов
$project_rows = get_project_rows($user_id, $con);

// Получение списка проектов
$task_rows = get_task_rows($user_id, $current_project_id, $con);

// Меню (список проектов)
$menu = include_template('menu-project.php', compact('current_project_id', 'project_rows'));
// HTML код главной страницы
$page_content = include_template('main.php', compact('show_complete_tasks', 'current_project_id', 'task_rows'));


// окончательный HTML код
$layout_content = include_template('layout.php', compact('menu', 'page_content', 'title'));

// Вывод контента
print($layout_content);
