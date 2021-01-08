<?php
require 'dbconnect.php';
//require 'escape.php';
//データ登録
function createBoard($db)
{
    $statement = $db->prepare('INSERT INTO posts SET reply_message_id=?');
    $statement->execute(array($_POST['reply_message_id']));
}
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $board = [
//         'reply_message_id' => $_POST['reply_message_id']
//     ];
// }
$db = dbconnect($db);
createBoard($db);
var_dump($_POST['reply_message_id']);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>掲示板(仮)</title>
</head>

<body>
    <h1>掲示板(仮)</h1>
    <form action="" method="POST">
        <label for="reply_message_id">励ましの言葉をお願いいたします</label>
        <textarea type="text" name="reply_message_id" id="reply_message_id" placeholder="140字までになります" maxlength="140" rows="6" cols="50"></textarea>
        </div>
        <button type="submit">投稿</button>
    </form>
</body>

</html>
