<?php
function connect()
{
    $db = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $db['dbname'] = ltrim($db['path'], '/'); //pathのみ取り出す
    $dsn = "mysql:host={$db['%']};dbname={$db['dbname']};charset=utf8";
    $driver_options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone='+09:00'"];
    try {
        $db = new PDO($dsn, $db['saaaMPro.local'], $db['pass'], $driver_options);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
        die('DB接続エラー: ' . $Exception->getMessage());
    }
    return $db;
}
