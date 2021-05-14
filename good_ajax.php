<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$good = filter_input(INPUT_POST, 'name');
$dataPostId = filter_input(INPUT_POST, 'data-posts_id'); //最初はNULL。ボタンを押すとid表示。
$goodList = filter_input(INPUT_GET, 'goodList');
require_once('connect.php');
$db = connect();
var_dump($dataPostId); //ボタンを押すとidが表示される.押す前はNULL。
var_dump($goodList); //NULLになる。GETの時の場合。関数をなくしボタンを押すと配列が表示される
//カウントアップ
if (isset($dataPostId)) {
    $query = "UPDATE posts SET good_count = good_count + 1 WHERE posts_id = ?";
    $statement = $db->prepare($query);
    $statement->bindValue(1, $dataPostId);
    $statement->execute();
}
//データ取得
function goodCount($db)
{
    $query = "SELECT good_count FROM posts";
    $select = $db->prepare($query);
    $select->execute();
    $goodList = $select->fetchAll(PDO::FETCH_ASSOC);
    return $goodList; //データが表示される
}
