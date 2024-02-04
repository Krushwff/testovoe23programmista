<?php

require_once 'db.php';

$conn = connect_db();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];

    add_message($conn, $title, $author, $summary, $content);

    header('Location: index.php');
}

// Отображение информации о сообщении
include 'templates/add_message.html';


close_db($conn);

?>