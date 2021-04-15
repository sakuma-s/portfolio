<?php
require 'connect.php';
sleep(3);
print($_REQUEST['name']);
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
