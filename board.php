<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>掲示板(仮)</title>
</head>

<body>
    <h1>掲示板(仮)</h1>
    <form action="create.php" method="POST">
        <?php if (count($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div>
            <label for="nickname">ニックネーム</label>
            <input type="text" name="nickname" id="nickname" value="<?php echo $board['nickname'] ?>">
        </div>
        <div>
            <label for="message">今の弱音をお書きください。多分誰かが励ましてくれます。</label>
            <textarea type="text" name="message" id="message" placeholder="140字までになります" maxlength="140" rows="6" cols="50"><?php echo $board['message'] ?></textarea>
        </div>
        <button type="submit">投稿</button>
    </form>
    <main>
        <?php foreach ($list as $value) : ?>
            <div><?php echo ($value['id']); ?></div>
            <div><?php echo h($value['nickname']); ?></div>
            <div><?php echo h($value['message']); ?></div>
            <div><a href="reply_message.php?id=<?php echo ($value['id']); ?>">コメント : </a><?php echo h($value['reply_message']); ?></div>
            <div><?php echo $value['created']; ?></div>
        <?php endforeach; ?>
    </main>
</body>

</html>
<!--投稿の削除-->
