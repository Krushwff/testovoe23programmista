<?php

require_once 'db.php';

$conn = connect_db();

$message_id = $_POST['message_id'];
$author = $_POST['author'];
$content = $_POST['content'];

add_comment($conn, $message_id, $author, $content);

header('Location: message.php?id=' . $message_id);

?>