<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'connect.php';
sleep(3);
print($_REQUEST['name']);
var_dump($_SERVER['REQUEST_METHOD']);
print_r($_POST['good']);
//データ登録
function goodButton($db, $board)
{
    $statement = $db->prepare('INSERT INTO good SET good_id=?');
    $statement->execute(array($board['good']));
}

//データ受け取り
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $board = [
        'good' => $_POST['good']
    ];
}

//データ表示(index.phpに記入)
