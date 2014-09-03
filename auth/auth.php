<?php
session_start();
$sid=session_id();
$logedin = false;
$db = new Database();
if (isset($_SESSION['time'])){
    $zeit = time() - $_SESSION['time'];
    if ($zeit > 1800){
        $_SESSION['logedin'] = false;
        session_destroy();
    }
}
if (isset($_SESSION['logedin']) && ($_SESSION['logedin'] == true)){
    if (pass_md5($_SERVER['HTTP_USER_AGENT'], substr($_SERVER["REMOTE_ADDR"],0,7)) != $_SESSION['finger']){
        $_SESSION['logedin'] = false;
        session_destroy();
    }
    else {
        $logedin = true;
        $_SESSION['time'] = time();
        $where['useraid'] = $_SESSION['userid'];
        $where['gelesen'] = 0;
        $newsql = $db->select("id", "nachrichten", $where);
        $news = $newsql->rowCount();
    }
}
?>
