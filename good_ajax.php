<?php
require 'connect.php';
sleep(3);
print($_REQUEST['name']);
var_dump($_SERVER['REQUEST_METHOD']);
print_r($_POST);
//データ登録
function goodButton($db, $board)
{
    $statement = $db->prepare('INSERT INTO good SET good_id=?');
    $statement->execute(array($board['name']));
}

//データ受け取り
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $board = [
        'name' => $_POST['good']
    ];
}

//データ表示(index.phpに記入)
