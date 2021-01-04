<?php
require('dbconnect.php');
//データ登録
$statement = $db->prepare('INSERT INTO posts SET name=?, message=?, created=NOW()');
$statement->execute(array($_POST['name'], $_POST['message']));
// ('Location: board.php');
// exit();
$list = []; //データベースの取り出し
//データ取得
$sql = $db->query('SELECT * FROM posts');
while ($posts = $sql->fetch()) {
    $list[] = $posts;
}
