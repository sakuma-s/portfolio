<?php
//require __DIR__ . '/vendor/autoload.php';
function connect()
{
    $db = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $db['dbname'] = ltrim($db['path'], '/'); //pathのみ取り出す
    $dsn = "mysql:host={$db['host']};dbname={$db['dbname']};charset=utf8";
    try {
        $db = new PDO($dsn, $db['user'], $db['pass']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
        die('DB接続エラー: ' . $Exception->getMessage());
    }
    return $db;
}
