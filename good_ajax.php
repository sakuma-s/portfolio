<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$good = filter_input(INPUT_POST, 'name');
$dataPostId = filter_input(INPUT_POST, 'data-posts_id');
$goodList = filter_input(INPUT_GET, 'goodList');
sleep(2);
require_once('connect.php');
$db = connect();
// echo 'good_ajax.phpで指定' . var_dump($goodList); //NULL
var_dump($dataPostId); //ボタンを押すとidが表示される
var_dump($goodList); //NULLになる。GETの時の場合。関数をなくしボタンを押すと配列が表示される
// var_export($good);
//カウントアップ
if (isset($dataPostId)) {
    $query = "UPDATE good SET good_id = good_id + 1 WHERE posts_id = ?";
    $statement = $db->prepare($query);
    $statement->bindValue(1, $dataPostId);
    $statement->execute();
}
//データ取得
// function goodCount($db, $goodList)
// {
if (isset($dataPostId)) {
    $query = "SELECT good_id FROM good WHERE posts_id = ?";
    $select = $db->prepare($query);
    $select->bindValue(1, $dataPostId);
    $select->execute();
    $goodList = $select->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($goodList); //データ取得できていた
    // return print_r($goodList);
}
// }
