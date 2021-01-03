<?php
require('dbconnect.php');
require('create.php');
//var_dump($_POST);
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
        <!--エラー文記入-->
        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="message">今の弱音をお書きください。多分誰かが励ましてくれます。</label>
            <textarea type="text" name="message" id="message" placeholder="140字までになります" maxlength="140" rows="6" cols="50"></textarea>
        </div>
        <button type="submit">投稿</button>
    </form>
    <main>
    </main>
</body>

</html>
<!--投稿の返信-->
<!--投稿の削除-->
