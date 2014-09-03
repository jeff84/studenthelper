<?php 
require("class/class.database.php");
require("class/class.validate.php");
require("auth/auth.php");
if ($logedin){
    if ($_SESSION["token"] == $_POST["token"]){
        date_default_timezone_set('Europe/Berlin');
        $datetime = date("Y-m-d-H-i-s");
        $gel = 0;
        unset($where);
        $where['nick'] = $_POST['nick'];
        $db = new Database();
        $uisq = $db->select("id", "user", $where);
        $us = $uisq->fetchObject();
        $Val = new Validate();
        $text = $Val->safertext($_POST['text']);
        $betreff = $Val->safertext($_POST['betreff']);
        $what['uservid'] = $_SESSION['userid'];
        $what['useraid'] = $us->id;
        $what['datetime'] = $datetime;
        $what['betreff'] = $betreff;
        $what['text'] = $text;
        $what['gelesen'] = $gel;
        $ins = $db->insert("nachrichten", $what);
        if ($ins){
            echo 'Nachricht erfolgreich verschickt. Zurück zur <a href="index.php?l=nachrichten">Nachrichtenübersicht</a>';
        }
        else {
            echo 'Fehler';
        }
    }
    else {
        echo "Fehler!";
    }
}
else {
    echo 'Du bist nicht eingeloggt...';
}
?>
