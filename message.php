<?php

// Подключение к базе данных
$db = new PDO('mysql:host=localhost;dbname=test23', 'root', '');

// Получение информации о сообщении
$id = $_GET['id'];
$stmt = $db->prepare('SELECT * FROM messages WHERE id = ?');
$stmt->execute([$id]);
$message = $stmt->fetch();

// Получение списка комментариев
$stmt = $db->prepare('SELECT * FROM comments WHERE message_id = ? ORDER BY created_at ASC');
$stmt->execute([$id]);
$comments = $stmt->fetchAll();

// Обработка формы редактирования
if (isset($_POST['edit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];

    $stmt = $db->prepare('UPDATE messages SET title = ?, author = ?, summary = ?, content = ? WHERE id = ?');
    $stmt->execute([$title, $author, $summary, $content, $id]);

    header('Location: templates/message.php?id=' . $id);
}

// Отображение информации о сообщении
include 'templates/message.html';

?>
