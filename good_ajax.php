<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$_POST['name'] = filter_input(INPUT_POST, 'name');
// $good = $_POST['name'];
var_dump($_POST['name']); //NULLになる?
var_dump($good['good']);
echo ($_POST['name']);

// echo $good . "goodの値"; //最初値がNULL。goodButtonを押すと、buttonの下に値が表示される。
//データ登録
function goodButton($db, $good)
{
    // $good = $_POST['name']; //取得できてい
    // echo $good . "goodの値" . "2"; //値が表示されない。↓NULLで登録されてしまう
    if (isset($good['good'])) {
        $statement = $db->prepare('INSERT INTO good SET good_id=?');
        $statement->bindValue(1, $good['good']);
        $statement->execute();
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $good = [
        'good' => $_POST['name']
    ];
}
