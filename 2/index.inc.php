<?php
session_start();
date_default_timezone_set('Asia/Shanghai');
require("model/Medoo.php");

use Medoo\Medoo;

global $db,$user;
$user = isset($_SESSION["user"]) ? $_SESSION["user"] : NULL;
if (isset($_SERVER["db"])) {
    $db = $_SERVER["db"];
} else {
    $db = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'db',
        'server' => 'localhost',
        'username' => 'db',
        'password' => '123456',
        'option'=>array(
            PDO::ATTR_PERSISTENT => true
        )
    ]);
    $_SERVER["db"] = $db;
}
require("model/model.php");
?>