<?php

require_once 'db.php';

$conn = connect_db();

$id = $_GET['id'];

$message = get_message($conn, $id);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $summary = $_POST['summary'];
    $content = $_POST['content'];

    edit_message($conn, $id, $title, $author, $summary, $content);

    header('Location: message.php?id=' . $id);
}

include 'templates/edit_message.html';

close_db($conn);

?>
