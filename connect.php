<?php
//require __DIR__ . '/vendor/autoload.php';
function connect()
{
    $db = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $db['DB_DATABASE'] = ltrim($db['path'], '/');
    $dbHost = $db['DB_HOST'];
    $dbUsername = $db['DB_USERNAME'];
    $dbPassword = $db['DB_PASSWORD'];
    $dbDatabase = substr($db['DB_DATABASE'], 1);
    try {
        $db = new PDO("mysql:dbname={$dbDatabase}, host={$dbHost}, charset=utf8, {$dbUsername}, {$dbPassword}");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
        die('DB接続エラー: ' . $Exception->getMessage());
    }
    return $db;
}
