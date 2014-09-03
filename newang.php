<?php 
require("class/class.validate.php");
require("auth/auth.php");
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
        print_r($_POST['tag']);
        
    }
    else {
        echo 'Error!';
    }
}
?>
