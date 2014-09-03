<?php 
require("../class/class.database.php");
require("../class/class.validate.php");
require('../auth/pass-md5.php');
require("../auth/auth.php");
if ($logedin){
    if ($_POST['token'] == $_SESSION['token']){
        if (isset($_POST['loeschen']) && isset($_POST['id'])){
            unset($where);
            $where['id'] = $_POST['id'];
            $stmt = $db->select('userid', 'nachhilfe', $where);
            $erg = $stmt->fetchObject();
            if ($erg->userid == $_SESSION['userid']){
                $set['erledigt'] = 1;
                if ($db->update('nachhilfe', $set, $where)){
                    echo 'Erfolgreich gelöscht. Zurück zur <a href="../index.php?l=meinkonto">Übersicht</a>';
                }
            }
        }
    }
    else {
        echo 'FEHLER!!!';
    }
}
?>
