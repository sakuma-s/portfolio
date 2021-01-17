<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'dbconnect.php';
$_POST['reply_message'] = filter_input(INPUT_POST, 'reply_message');
//投稿へのコメント
function commentBoard($db)
{
    $statement = $db->prepare('INSERT INTO posts SET reply_message=?, created=NOW()');
    $statement->execute(array($_POST['reply_message']));
}
$db = dbconnect();
commentBoard($db);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo '励ましました！一覧でご確認くださいませ!';
}
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
    <a href="board.php">一覧画面に戻る</a>
    <form action="" method="POST">
        <label for="reply_message">励ましの言葉をお願いいたします</label>
        <textarea type="text" name="reply_message" id="reply_message" placeholder="140字までになります" maxlength="140" rows="6" cols="50"><?php echo $_REQUEST['nickname']; ?>さんへ&nbsp;</textarea>
        <button type="submit">投稿</button>
    </form>
</body>

</html>
