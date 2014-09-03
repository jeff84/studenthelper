<?php
function csrf_token(){
    $token = md5('dhjlut76#'.time());
    $_SESSION['token'] = $token;
    return $token;
}
?>
