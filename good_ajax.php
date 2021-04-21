<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'connect.php';
$db = connect();
$_POST['name'] = filter_input(INPUT_POST, 'name');
print('jsデータ送信確認' . $_POST['name'] . 'です');
$good = $_POST['name'];
//データ登録
function goodButton($db, $good)
{
    $statement = $db->prepare('INSERT INTO good SET good_id=?');
    $statement->execute(array($good));
}
//取得しカウントした値を(index.phpに表示)
