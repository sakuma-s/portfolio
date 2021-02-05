<?php
//エラー表示
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//上記と同じ
var_dump(get_included_files());
var_dump($_SERVER['REQUEST_METHOD']);
