<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('connect.php');
$db = connect();
$good = filter_input(INPUT_POST, 'name');
echo ($good); //最初はNULL→ボタンを押すとgood
sleep(2);
//データ登録
if (isset($good)) {
    $statement = $db->prepare('INSERT INTO good SET good_id=?');
    $statement->bindValue(1, $good);
    $statement->execute();
}
