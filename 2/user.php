<?php
require("index.inc.php");
$action = $_GET["action"];
$method = get_method() ? "GET" : "POST";
if ($action == "login") {
    if ($method == "GET") {
        include "view/user_login.html";
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $r = user_login($username, $password);
        if ($r == -1) {
            echo "用户名不存在<br>";
            include "view/user_login.html";
        } elseif ($r == -2) {
            echo "密码错误<br>";
            include "view/user_login.html";
        } elseif ($r == 1) {
            header("refresh:0;url='index.php';");
        }
    }
} elseif ($action == "reg") {
    if ($method == "GET") {
        include "view/user_reg.html";
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $r = user_create($username, $password);
        if ($r == -1) {
            echo "用户名已被注册<br>";
            include "view/user_reg.html";
        } elseif ($r == 1) {
            header("refresh:0;url='index.php';");
        }
    }
} elseif ($action == "logout") {
    unset($_SESSION["user"]);
    global $user;
    $user = array();
    header("refresh:0;url='index.php';");
}
?>