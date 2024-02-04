<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'test23';
// Подключение к базе данных

function connect_db() {
    global $db_host, $db_user, $db_password, $db_name;

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die('Ошибка подключения к базе данных: ' . $conn->connect_error);
    }

    return $conn;
}

function close_db($conn) {
    $conn->close();
}

function get_messages($conn) {
    $result = $conn->query('SELECT * FROM messages');

    if (!$result) {
        die('Ошибка выполнения запроса: ' . $conn->error);
    }

    return $result;
}

function get_message($conn, $id) {
    $result = $conn->query('SELECT * FROM messages WHERE id = ' . $id);

    if (!$result) {
        die('Ошибка выполнения запроса: ' . $conn->error);
    }

    return $result->fetch_assoc();
}

function add_message($conn, $title, $author, $summary, $content) {
    $conn->query('INSERT INTO messages (title, author, summary, content) VALUES ("' . $title . '", "' . $author . '", "' . $summary . '", "' . $content . '")');
}

function edit_message($conn, $id, $title, $author, $summary, $content) {
    $conn->query('UPDATE messages SET title = "' . $title . '", author = "' . $author . '", summary = "' . $summary . '", content = "' . $content . '" WHERE id = ' . $id);
}

function add_comment($conn, $message_id, $author, $content) {
    $conn->query('INSERT INTO comments (message_id, author, content) VALUES (' . $message_id . ', "' . $author . '", "' . $content . '")');
}


?>