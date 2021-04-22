<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$_POST['name'] = filter_input(INPUT_POST, 'name');
print($_POST['name']);
$good = $_POST['name'];
echo $good;
//データ登録
function goodButton($db, $good)
{
    $statement = $db->prepare('INSERT INTO good SET good_id=?');
    $statement->execute(array($good));
}
//取得しカウントした値を(index.phpに表示)
