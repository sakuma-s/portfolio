<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// $good = filter_input(INPUT_POST, 'name');
$dataPostId = filter_input(INPUT_POST, 'data-posts_id'); //最初はNULL。ボタンを押すとid表示。
$goodCount = filter_input(INPUT_GET, 'goodCount');
require_once('connect.php');
$db = connect();
var_dump($dataPostId);
// $dataId = isset($dataPostId); //関数で使用する時にNULLの値を渡したくないので確認
// var_dump($dataId);//ボタンを押すとtrue。最初はfalse。
// var_dump($goodCount);
// var_dump($good);
// print($_REQUEST['data-posts_id'] . 'にgoodボタンが押されました'); //idが表示される
//カウントアップ
if (isset($dataPostId)) {
    $query = "UPDATE posts SET good_count = good_count + 1 WHERE posts_id = ?";
    $statement = $db->prepare($query);
    $statement->bindValue(1, $dataPostId);
    $statement->execute();
}
//データ取得表示
function goodList($db, $dataPostId)
{
    if (isset($dataPostId)) {
        $query = "SELECT good_count FROM posts";
        $select = $db->prepare($query);
        $select->execute();
        $goodCount = $select->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($goodCount); //一番上に配列でカウント数が表示される
        //echo gettype($goodCount); //array
        return $goodCount;
    }
}
