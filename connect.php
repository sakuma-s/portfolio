<?php
function connect()
{
    // $db = parse_url(getenv("CLEARDB_DATABASE_URL"));
    // $db['dbname'] = ltrim($db['path'], '/'); //pathのみ取り出す

    // $dsn = "mysql:dbname=;host=saaaMPro.localhost;port=3306;charset=utf8mb4";
    // $driver_options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone='+09:00'"];
    // $host = "saaaMPro.local";
    // $dbname = "portlolio";
    // $dsn = "mysql:host=localhost;port=3306;dbname=db1;charset=utf8mb4";
    $user = "saaaMPro.local";
    $password = "kirasan098";

    try {
        $db = new PDO('mysql:host=localhost;dbname=portfolio;unix_socket=/tmp/mysql.sock', $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
        die('DB接続エラー: ' . $Exception->getMessage());
    }
    return $db;
}
