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
// var_dump($dataPostId);
// var_dump($goodList);//NULLになる
// var_export($good);
//カウントアップ
if (isset($dataPostId)) {
    $query = "UPDATE good SET good_id = good_id + 1 WHERE posts_id = ?";
    $statement = $db->prepare($query);
    $statement->bindValue(1, $dataPostId);
    $statement->execute();
}
//データ取得
// function goodCount($db)
// {
// if (isset($dataPostId)) {
$query = "SELECT good_id FROM good WHERE posts_id = ?";
$select = $db->prepare($query);
$select->bindValue(1, $dataPostId);
$select->execute();
$goodList = $select->fetchAll(PDO::FETCH_ASSOC); //指定の１つのカラムを取得
    // } else {
    //     echo "データを取得できませんでした";
// }
// return $goodList;
// }
