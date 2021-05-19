<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$dataPostId = filter_input(INPUT_POST, 'data-posts_id'); //最初はNULL。ボタンを押すとid表示。
require_once('connect.php');
$db = connect();
$_REQUEST['data-posts_id'];
// var_dump($dataPostId); //最初はNULL
// var_dump($goodCount); //最初はNULL
//カウントアップ
if (isset($dataPostId)) {
    $query = "UPDATE posts SET good_count = good_count + 1 WHERE posts_id = ?";
    $statement = $db->prepare($query);
    $statement->bindValue(1, $dataPostId);
    $statement->execute();
}
//データ取得表示
// function goodList($db, $dataPostId) //関数にするとNULLになる
// {
if (isset($dataPostId)) {
    $goodCount = [];
    $query = "SELECT good_count FROM posts";
    $select = $db->prepare($query);
    $select->execute();
    $goodCount = $select->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($goodCount); //一番上に配列でカウント数が表示される
    //echo gettype($goodCount); //array
}
// return $goodCount;
// }
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $dataPostId = [
//         'data-posts_id' => $_POST['data-posts_id']
//     ];
//     $goodCount = goodList($db, $dataPostId);
// }
