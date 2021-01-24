<?php
//DB接続
function dbConnect()
{
    try {
        $db = new PDO('mysql:dbname=board;host=localhost;port=8889;charset=utf8', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
        die('DB接続エラー: ' . $Exception->getMessage());
    }
    return $db;
}
