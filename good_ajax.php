<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$_POST['name'] = filter_input(INPUT_POST, 'name');
print($_POST['name']);
$good = $_POST['name'];
var_dump($good) . "goodの値";
echo $good . "goodの値";
//データ登録
function goodButton($db)
{
    $statement = $db->prepare('INSERT INTO good SET good_id=?');
    $statement->bindValue(1, $_POST['name']);
    $statement->execute();
}
//取得しカウントした値を(index.phpに表示)
