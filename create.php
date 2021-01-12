<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// POSTされたトークンを取得
$token = isset($_POST["token"]) ? $_POST["token"] : "";
// セッション変数のトークンを取得
$session_token = isset($_SESSION["token"]) ? $_SESSION["token"] : "";
// セッション変数のトークンを削除
unset($_SESSION["token"]);
// POSTされたトークンとセッション変数のトークンの比較
if ($token != "" && $token == $session_token) {
    echo "書き込みました";
} else {
    echo "error : 不正な登録処理です";
    var_dump($token);
}
$board = [
    'nickname',
    'message'
];
require 'escape.php';
//データ登録
function createBoard($db)
{
    $statement = $db->prepare('INSERT INTO posts SET nickname=?, message=?,created=NOW()');
    $statement->execute(array($_POST['nickname'], $_POST['message']));
}
//バリデーション処理
function validate()
{
    $errors = [];
    if (!strlen('nickname')) {
        $errors['nickname'] = 'ニックネームを入力してください';
    }
    if (!strlen('message')) {
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

        //'reply_message_id' => $_POST['reply_message_id']
    ];
}
//header('Location: board.php');
//     if (!count($errors)) {
//         $db = dbConnect();
//         createBoard($db);
//         $list = listBoard($db);
//     }
// }
//include 'board.php';
