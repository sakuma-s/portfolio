<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('connect.php');
$db = connect();
$good = filter_input(INPUT_POST, 'name');
$posts_id = filter_input(INPUT_POST, 'data-posts_id');
sleep(2);
var_dump($posts_id); //NULLになる
var_export($good);
//カウントアップ
if (isset($posts_id)) {
    $query = "UPDATE good SET good_id = good_id + 1 WHERE posts_id = ?";
    $statement = $db->prepare($query); //$dsnにする？
    $statement->bindValue(1, $posts_id);
    $statement->execute();
}
//データ取得
if (isset($posts_id)) {
    $query = "SELECT good_id FROM good WHERE posts_id = ?";
    $select = $db->prepare($query);
    $select->bindValue(1, $posts_id);
    $select->execute();
    $goodList = $select->fetchAll(PDO::FETCH_ASSOC); //指定の１つのカラムを取得
}
