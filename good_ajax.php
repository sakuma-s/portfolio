<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'connect.php';
sleep(3);
print($_REQUEST['name']);
print_r($_POST['name']);
//データ登録
function goodButton($db, $board)
{
    $statement = $db->prepare('INSERT INTO good SET good_id=?');
    $statement->execute(array($board['name']));
}

//データ受け取り
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $board = [
        'name' => $_POST['name']
    ];
}

//データ表示(index.phpに記入)
