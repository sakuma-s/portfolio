<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// require 'connect.php';
sleep(3);
print($_REQUEST['name']);
$_POST['name'] = filter_input(INPUT_POST, 'name');
$good = $_POST['name'];
//データ登録
function goodButton($db, $good)
{
    $statement = $db->prepare('INSERT INTO good SET good_id=?');
    $check = $statement->execute(array($good));
    if ($check) {
        print '成功';
    } else {
        print '失敗';
    }
}

//データ受け取り
//今の所必要ない？
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $board = [
//         'name' => $_POST['name']
//     ];
// }

//データ表示(index.phpに記入)
