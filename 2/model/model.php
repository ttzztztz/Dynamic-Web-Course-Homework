<?php
function user_create($username, $password)
{
    global $db;
    $_user = $db->select("user", "*", array(
        "username" => $username
    ));

    if (count($_user) > 0) return -1;
    $password_md5 = md5($password);
    $r = $db->insert("user", array(
        "username" => $username,
        "password" => $password_md5
    ));
    if ($r) {
        user_login($username, $password);
    }
    return 1;
}

function user_login($username, $password)
{
    global $db, $user;
    $_user_db = $db->select("user", "*", array(
        "username" => $username
    ));
    if (count($_user_db) <= 0) return -1;
    $_user = $_user_db[0];
    if (md5($password) == $_user["password"]) {
        $user = $_user;
        $_SESSION["user"] = $user;
        return 1;
    } else {
        return -2;
    }
}

function user_read($uid)
{
    global $db;
    $_user_db = $db->select("user", "*", array(
        "uid" => $uid
    ));
    if (count($_user_db) <= 0) return -1;
    return $_user_db[0]["username"];
}

?>