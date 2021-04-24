<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$good = filter_input(INPUT_POST, 'name');
// $good = $_POST['name'];
var_dump($good); //最初はNULL→ボタンを押すとgood
// var_dump($_POST['name']); //NULL
// var_dump($good['good']); //NULL
echo ($good);

// echo $good . "goodの値"; //最初値がNULL。goodButtonを押すと、buttonの下に値が表示される。
//データ登録
// function goodButton($db, $good)
// {
// $good = $_POST['name']; //取得できてい
// echo $good . "goodの値" . "2"; //値が表示されない。↓NULLで登録されてしまう
if (isset($good)) {
    $statement = $db->prepare('INSERT INTO good SET good_id=?');
    $statement->bindValue(1, $good);
    $statement->execute();
}
// }
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $good = [
//         'good' => $_POST['name']
//     ];
// }
