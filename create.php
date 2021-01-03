<?php
require('dbconnect.php');
$statement = $db->prepare('INSERT INTO posts SET name=?, message=?, created=NOW()');
$statement->execute(array($_POST['name'], $_POST['message']));
echo 'メッセージが登録されました';

// if (!empty($_POST)) {
//     if($_POST['name'] !== '') {
//         $name = $db->prepare('INSERT INTO posts SET name=?, message=?, created=NOW()');
//         $message->execute(array(
//             $
//         ))
//     }
// }

//データ取得
// $records = $db->query('SELECT * FROM posts');
// while ($record = $records->fetch()) {
//     echo ($record['id'] . PHP_EOL);
//     echo ($record['name'] . PHP_EOL);
//     echo ($record['message'] . PHP_EOL);
// }
