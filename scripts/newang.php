<?php
require('../class/class.database.php');
require('../auth/pass-md5.php');
require("../class/class.validate.php");
require("../auth/auth.php");
if ($logedin){
    if ($_SESSION["token"] == $_POST["token"]){
        date_default_timezone_set('Europe/Berlin');
        $datetime = date("Y-m-d-H-i-s");
        $val = new Validate();
        $db = new Database();
        if (!$val->onlytext($_POST['fach'])){
            die('Fach darf nur Buchstaben, Zahlen und - enthalten');
        }
        if (!$val->onlytext($_POST['zeitraum'])){
            die('Zeitraum darf nur Buchstaben, Zahlen -, _, : und . enthalten');
        }
        $tag = "";
        for ($x = 0; $x < count($_POST['tag']); $x++){
            $tag .= ";".$_POST['tag'][$x];
        }
        $tag = substr($tag, 1);
        $what['userid'] = $_SESSION['userid'];
        $what['ortid'] = $_POST['ort'];
        $what['datetime'] = $datetime;
        $what['fach'] = $_POST['fach'];
        $what['zeitraum'] = $_POST['zeitraum'];
        $what['tage'] = $tag;
        $what['text'] = $val->safertext($_POST['text']);
        $what['typ'] = $_POST['typ'];
        if ($db->insert('nachhilfe', $what)){
            echo 'Erfolgreich eingetragen. <a href="../index.php?l=meinkonto">Zurück zur Übersicht</a>';
        }
        else {
            echo 'Fehler beim Eintragen. <a href="../index.php?l=angebote&a=nangebot">Zurück zur Übersicht</a>';
        }
        
    }
    else {
        echo 'Error!';
    }
}
?>
