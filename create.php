<?php
require 'escape.php';
$_GET['id'] = filter_input(INPUT_GET, 'id');
$id = $_GET['id'];
$_GET['page_id'] = filter_input(INPUT_GET, 'page_id');
//データ登録
function createBoard($db, $board)
{
    if (!empty($board['nickname']) && !empty($board['message'])) {
        $statement = $db->prepare('INSERT INTO posts SET nickname=?, message=?,created=NOW()');
        $statement->execute(array($board['nickname'], $board['message']));
    }
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
//ページネーションの作成
function pagiNation($db)
{
    define('max_view', 10);
    $count = $db->prepare('SELECT COUNT(*) AS count FROM posts');
    $count->execute();
    $total_count = $count->fetch(PDO::FETCH_ASSOC);
    $maxPage = ceil($total_count['count'] / max_view);
    //ページ番号の取得
    $page = $_GET['page_id'];
    if ($page === '') {
        $page = 1;
    } else {
        $page = $_GET['page_id'];
    }
    $page = max($page, 1);
    $page = min($page, $maxPage);
    //表示する記事の取得
    $select = $db->prepare("SELECT * FROM posts ORDER BY id DESC LIMIT :start,:max ");
    //1ページ目の処理
    if ($page === 1) {
        $select->bindValue(":start", $page - 1, PDO::PARAM_INT);
        $select->bindValue(":max", max_view, PDO::PARAM_INT);
    } else {
        $select->bindValue(":start", ($page - 1) * max_view, PDO::PARAM_INT);
        $select->bindValue(":max", max_view, PDO::PARAM_INT);
    }
    $select->execute();
    $list = $select->fetchAll(PDO::FETCH_ASSOC);
    return [$page, $maxPage, $list];
}
//データの削除
function deleteBoard($db, $id)
{
    $statement = $db->prepare('DELETE FROM posts WHERE id=?');
    $statement->execute(array($id));
    //header('Location: board.php');
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
