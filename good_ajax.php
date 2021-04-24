<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('connect.php');
$db = connect();
$good = filter_input(INPUT_POST, 'name');
var_dump($good); //最初はNULL→ボタンを押すとgood
// var_dump($_POST['name']); //NULL
// var_dump($good['good']); //NULL
echo ($good) . PHP_EOL;

// echo $good . "goodの値"; //最初値がNULL。goodButtonを押すと、buttonの下に値が表示される。
//データ登録
goodButton($db, $good);

function goodButton($db, $good)
{
    if (isset($good)) {
        $statement = $db->prepare('INSERT INTO good SET good_id=?');
        $statement->bindValue(1, $good);
        $statement->execute();
    }
}
