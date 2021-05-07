<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$errors = [];
$board = [];
// $goodList = [];設置してからボタンが表示されなくなった
require_once('connect.php');
require_once('create.php');
$db = connect();
createBoard($db, $board);
deleteBoard($db, $posts_id);
list($page, $maxPage, $list) = pagiNation($db);
require_once('good_ajax.php'); //この順番をcreate.phpの下にすると削除機能が動作しなくなる
$goodList = goodCount($db);

var_dump($goodList);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="icon" href="images/1535965055.png" type="images/x-icon" />
    <link rel="shortcut icon" href="images/1535965055.png" type="images/x-icon" />
    <title>励まし会議</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3 mb-3"><a class="text-body text-decoration-none" href="index.php">励まし会議</a></h1>
        <p class="text-center">-誰もが励まし合える場所-</p>
        <div><img src="images/1535965055.png" class="rounded mx-auto d-block" alt="握手している画像" height="150" width="150"></div>
        <p>弱音を言う、誰かに励まされる。</p>
        <p>励まされた分誰かを励ます。</p>
        <p>弱音、不安な気持ち、孤独感をテーマに書き込みするサイトです。</p>
        <p>＊本末転倒にはなりますが、励まされる事はあまり期待せず自分が今どんな事を思っているのか？書き込む事で自分の今の気持ちに何となく気づき一歩引いて自分を見て、冷静に行動するきっかけを作る事が第一目的です。</p>
        <p>＊第二の目的は、お互い励まし合うような空気感が周りにいっぱいできたら孤独感を感じている人へプラスの作用を発生させられるのではないかと思い製作いたしました。実際私は、孤独感を感じている時にネット上で励ましの言葉をもらい元気になれた時がありました。自分の為に制作したのかもしれません。このサイトが誰かのお役に立てれば幸いです。</p>
        <p>励ましの言葉は、あまり期待しないでください。</p>
        <form action="index.php" method="POST">
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
                <label for="message">書き込んでください。多分誰かが励ましてくれます。</label>
                <textarea class="form-control" name="message" id="message" placeholder="140字までになります" maxlength="140" rows="6" cols="50"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-secondary">投稿</button>
            </div>
        </form>
        <main>
            <?php foreach ($list as $value) : ?>
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <div><?php echo ($value['posts_id']); ?>&nbsp;<?php echo h($value['nickname']); ?></div>
                            <div><?php echo h($value['message']); ?></div>
                            <div><a href="reply_message.php?posts_id=<?php echo ($value['posts_id']); ?>">[コメント]</a><?php echo h($value['reply_message']); ?></div>
                            <div><a href="?posts_id=<?php echo ($value['posts_id']) ?>">[削除]</a></div>
                            <div><?php echo $value['created']; ?></div>
                            <i class="far fa-thumbs-up"><input data-posts_id=<?php echo ($value['posts_id']); ?> class="good" type="button" name="good" value="good">
                            </i>
                            <div id="result"></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </main>
        <div class="mt-3 mb-5">
            <a href="?page_id=<?php echo ($page === 1); ?>">&nbsp;最初</a>
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
        <footer>
            <p class="text-center">&#169; 2021 励まし委員会</p>
        </footer>
    </div>
    <script src="good_ajax.js"></script>
</body>

</html>
