<?php
//DB接続
function dbConnect()
{
    try {
        $db = new PDO('mysql:dbname=board;host=localhost;port=8889;charset=utf8', 'root', 'root');
    } catch (PDOException $e) {
        echo 'DB接続エラー: ' . $e->getMessage();
    }
    return $db;
}
