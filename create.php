<?php
require('dbconnect.php');
//データ登録
if (!empty($_POST)) {
    if ($_POST['message'] !== '') {
        $message = $db->prepare('INSERT INTO posts SET name=?, message=?, created=NOW()');
        $message->execute(array($_POST['name'], $_POST['message']));
        // ('Location: board.php');
        // exit();
    } else {
        echo '何か入力してください';
    }
}
//データ取得
$records = $db->query('SELECT * FROM posts');
while ($record = $records->fetch()) {
    echo ($record['id'] . PHP_EOL);
    echo ($record['name'] . PHP_EOL);
    echo ($record['message'] . PHP_EOL);
}
