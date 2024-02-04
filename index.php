<?php

require_once 'db.php';

$conn = connect_db();

$messages = $conn->query('SELECT * FROM messages');

?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Список сообщений</title>
    </head>
    <body>
    <h1>Список сообщений</h1>

    <ul>
        <?php foreach ($messages as $message): ?>
            <li>
                <h2><?php echo $message['title'] ?></h2>
                <p><?php echo $message['summary'] ?></p>
                <a href="message.php?id=<?php echo $message['id'] ?>">Читать далее...</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="add_message.php?id=<?php echo $message['id'] ?>">Добавить сообщение</a>
    </body>
    </html>
<?php

close_db($conn);

?>