<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('connect.php');
$db = connect();
$good = filter_input(INPUT_POST, 'name');
echo ($good); //最初はNULL→ボタンを押すとgood
$posts_id = filter_input(INPUT_POST, 'data-posts_id');
echo ($posts_id);
sleep(2);
echo var_export($good);
//データ登録
if (isset($good, $posts_id)) {
    $statement = $db->prepare('INSERT INTO good SET good_id=? posts_id=?');
    $statement->bindValue(1, $good);
    $statement->bindValue(2, $posts_id);
    $statement->execute();
}
