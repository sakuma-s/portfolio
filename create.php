<?php
require 'dbconnect.php';
require 'escape.php';
//データ登録
function createBoard($db)
{
    $statement = $db->prepare('INSERT INTO posts SET name=?, message=?,created=NOW()');
    $statement->execute(array($_POST['name'], $_POST['message']));
}
//バリデーション処理
function validate($board)
{
    $errors = [];
    if (!strlen($board['name'])) {
        $errors['name'] = 'ニックネームを入力してください';
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
        'name' => $_POST['name'],
        'message' => $_POST['message'],
    ];
    $errors = validate($board);
    if (!count($errors)) {
        $db = dbConnect();
        createBoard($db);
        $list = listBoard($db);
    }
}
include 'board.php';
//header("Location: board.php");
