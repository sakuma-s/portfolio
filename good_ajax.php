<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$good = filter_input(INPUT_POST, 'name');
$dataPostId = filter_input(INPUT_POST, 'data-posts_id'); //最初はNULL。ボタンを押すとid表示。
$goodList = filter_input(INPUT_GET, 'goodList');
// $_POST['data-post_id'] = filter_input(INPUT_POST, 'data-posts_id');
sleep(2);
require_once('connect.php');
$db = connect();
// echo 'good_ajax.phpで指定' . var_dump($goodList); //NULL
// var_dump($_POST['data-post_id']);
var_dump($dataPostId); //ボタンを押すとidが表示される.押す前はNULL。
var_dump($goodList); //NULLになる。GETの時の場合。関数をなくしボタンを押すと配列が表示される
// var_dump($dataPost['data-posts_id']); //null
// var_export($good);
//カウントアップ
if (isset($dataPostId)) {
    $query = "UPDATE good SET good_id = good_id + 1 WHERE posts_id = ?";
    $statement = $db->prepare($query);
    $statement->bindValue(1, $dataPostId);
    $statement->execute();
}
//データ取得
// function goodCount($db, $dataPost)
// {
if (isset($dataPostId)) {
    $query = "SELECT good_id FROM good WHERE posts_id = ?";
    $select = $db->prepare($query);
    $select->bindValue(1, $dataPostId);
    $select->execute();
    $goodList = $select->fetchAll(PDO::FETCH_ASSOC);
    return $goodList; //データ取得できていた
} else {
    echo "データが取得できませんでした" . PHP_EOL;
    echo "値は:" . var_dump($dataPostId) . "です";
}
// }
// if ($_SERVER['REQUEST_METHOD'] === 'POST') { //カスタムデータを取得できていないのでNULLになる
//     $dataPost = [
//         'data_posts_id' => $_POST['data_posts_id']
//     ];
// } else {
//     echo "$dataPostは、POSTされていません";
// }
