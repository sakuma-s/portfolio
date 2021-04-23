<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$_POST['name'] = filter_input(INPUT_POST, 'name');
// var_dump($good) . "goodの値";
// echo $good . "goodの値";
//データ登録
function goodButton($db, $good)
{
    $good = $_POST['name'];
    $statement = $db->prepare('INSERT INTO good SET good_id=?');
    $statement->execute($good);
}
//取得しカウントした値を(index.phpに表示)
