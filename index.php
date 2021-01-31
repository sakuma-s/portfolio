<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$errors = [];
$board = [];
require_once('connect.php');
require_once('create.php');
$db = connect();
createBoard($db, $board);
deleteBoard($db, $id);
list($page, $maxPage, $list) = pagiNation($db);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>励まし掲示板(仮)</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-3 mb-5"><a class="text-body text-decoration-none" href="index.php">励まし掲示板(仮)</a></h1>
        <form action="" method="POST">
            <?php if (count($errors) > 0) : ?>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="mb-2">
                <label for="nickname" class="form-label">ニックネーム</label>
                <input type="text" class="form-control" name="nickname" id="nickname">
            </div>
            <div class="mb-2">
                <label for="message">弱音を書き込んでください。多分誰かが励ましてくれます。</label>
                <textarea type="text" class="form-control" name="message" id="message" placeholder="140字までになります" maxlength="140" rows="6" cols="50"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-secondary">投稿</button>
            </div>
        </form>
        <main>
            <?php foreach ($list as $value) : ?>
                <div><?php echo ($value['id']); ?>&nbsp;<?php echo h($value['nickname']); ?></div>
                <div><?php echo h($value['message']); ?></div>
                <div><a href="reply_message.php?id=<?php echo ($value['id']); ?>">[コメント]</a><?php echo h($value['reply_message']); ?></div>
                <div><a href="?id=<?php echo ($value['id']) ?>">[削除]</a></div>
                <div><?php echo $value['created']; ?></div>
            <?php endforeach; ?>
        </main>
        <div>
            <a href="?page_id=<?php echo ($page === 1); ?>">最初</a>
            <?php if ($page > 1) : ?>
                <a href="?page_id=<?php echo ($page - 1); ?>"><?php echo ($page - 1); ?>ページ</a>
            <?php endif; ?>
            |
            <?php if ($page < $maxPage) : ?>
                <a href="?page_id=<?php echo ($page + 1); ?>"><?php echo ($page + 1); ?>ページ</a>
            <?php endif; ?>
            |
            <a href="?page_id=<?php echo $maxPage; ?>">最後</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>
