<?php
require('dbconnect.php');
//データ登録
$statement = $db->prepare('INSERT INTO posts SET name=?, message=?, created=NOW()');
$result = $statement->execute(array($_POST['name'], $_POST['message']));
//バリデーション処理
if ($_POST['name'] === '') {
    echo 'ニックネームを入力してください';
}
if ($_POST['message'] === '') {
    echo '投稿が未入力です';
}
$list = []; //データベースの取り出し
//データ取得
$sql = $db->query('SELECT * FROM posts');
while ($posts = $sql->fetch()) {
    $list[] = $posts;
}
//二重登録防止
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Location: board.php");
    exit;
}
