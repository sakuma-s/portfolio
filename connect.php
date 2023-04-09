<?php
function connect()
{
    // $db = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $db['dbname'] = ltrim($db['path'], '/'); //pathのみ取り出す

    // $dsn = "mysql:dbname=;host=saaaMPro.localhost;port=3306;charset=utf8mb4";
    // $driver_options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone='+09:00'"];
    $host = "saaaMPro.local";
    $dbname = "portlolio";
    $user = "root@localhost";
    $password = "kirasan098";

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
        die('DB接続エラー: ' . $Exception->getMessage());
    }
    return $db;
}
