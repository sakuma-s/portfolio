<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'dbconnect.php';
//投稿へのコメント
function commentBoard($db)
{
    if (isset($_POST['reply_message'])) {
        $statement = $db->prepare('INSERT INTO posts SET reply_message=?, created=NOW()');
        $statement->execute(array($_POST['reply_message']));
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>励まし掲示板(仮)</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-3 mb-5"><a class="text-body text-decoration-none" href="board.php">励まし掲示板(仮)</h1>
        <form action="" method="POST">
            <div class="mb-2">
                <label for="reply_message">励ましの言葉をお願いいたします</label>
            </div>
            <div class="mb-2">
                <textarea type="text" class="form-control" name="reply_message" id="reply_message" placeholder="140字までになります" maxlength="140" rows="6" cols="50"><?php echo $_REQUEST['nickname']; ?>さんへ&nbsp;</textarea>
            </div>

            <button type="submit" class="btn btn-secondary">投稿</button>
            <a class="btn btn-primary" href="board.php" role="button">一覧へ</a>
    </div>
    </form>
</body>

</html>
