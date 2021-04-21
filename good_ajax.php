<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// require 'connect.php';
//sleep(3);
//print($_REQUEST['name']);
$_POST['name'] = filter_input(INPUT_POST, 'name');
print('jsデータ送信確認' . $_POST['name']);
//var_dump($good); //NULLと表示される。ボタンを押すとgoodが表示される。
//データ登録
function goodButton($db, $good)
{
    $statement = $db->prepare('INSERT INTO good SET good_id=?');
    $statement->execute(array($good));
}

//データ受け取り
//今の所必要ない？
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $board = [
//         'name' => $_POST['name']
//     ];
// }

//データ表示(index.phpに記入)
