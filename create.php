<?php
require 'escape.php';
$_POST['nickname'] = filter_input(INPUT_POST, 'name');
$_POST['message'] = filter_input(INPUT_POST, 'message');
//データ登録
function createBoard($db)
{
    $statement = $db->prepare('INSERT INTO posts SET nickname=?, message=?,created=NOW()');
    $statement->execute(array($_POST['nickname'], $_POST['message']));
}
//バリデーション処理
function validate($board)
{
    $errors = [];
    if (!strlen($board['nickname'])) {
        $errors['nickname'] = 'ニックネームを入力してください';
    }
    if (!strlen($board['message'])) {
        $errors['message'] = '投稿が未入力です';
    }
    return $errors;
}
function listBoard($db)
{
    //データベースの取り出し
    $list = [];
    //データ取得
    $sql = $db->query('SELECT * FROM posts ORDER BY id DESC');
    while ($posts = $sql->fetch()) {
        $list[] = $posts;
    }
    return $list;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $board = [
        'nickname' => $_POST['nickname'],
        'message' => $_POST['message'],
    ];
    $errors = validate($board);
    if (!count($errors)) {
        header('Location: board.php');
    }
}
