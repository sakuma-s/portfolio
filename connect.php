<?php
//require __DIR__ . '/vendor/autoload.php';
function connect()
{
    try {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        $dbHost = $url['DB_HOST'];
        $dbUsername = $url['DB_USERNAME'];
        $dbPassword = $url['DB_PASSWORD'];
        $dbDatabase = $url['DB_DATABASE'];

        $db = new PDO("mysql:dbname={$dbDatabase}, host={$dbHost}, charset=utf8, {$dbUsername}, {$dbPassword}");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
        die('DB接続エラー: ' . $Exception->getMessage());
    }
    return $db;
}
