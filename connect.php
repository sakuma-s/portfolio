<?php
require __DIR__ . '/vendor/autoload.php';
function connect()
{
    try {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $dbHost = $_ENV['DB_HOST'];
        $dbUsername = $_ENV['DB_USERNAME'];
        $dbPassword = $_ENV['DB_PASSWORD'];
        $dbDatabase = $_ENV['DB_DATABASE'];

        $db = new PDO("mysql:dbname={$dbDatabase}, host={$dbHost}, charset=utf8, {$dbUsername}, {$dbPassword}");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $Exception) {
        die('DB接続エラー: ' . $Exception->getMessage());
    }
    return $db;
}
