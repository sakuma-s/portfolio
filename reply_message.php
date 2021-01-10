<?php
require 'dbconnect.php';
//投稿へのコメント
function createBoard($db)
{
    $statement = $db->prepare('UPDATE posts SET reply_message=? WHERE id=?');
    $statement->execute(array($_POST['reply_message'], $_REQUEST['id']));
}
$db = dbconnect();
createBoard($db);
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
    <a href="create.php">一覧画面に戻る</a>
    <form action="" method="POST">
        <label for="reply_message">励ましの言葉をお願いいたします</label>
        <textarea type="text" name="reply_message" id="reply_message" placeholder="140字までになります" maxlength="140" rows="6" cols="50"></textarea>
        <button type="submit">投稿</button>
    </form>
</body>

</html>
