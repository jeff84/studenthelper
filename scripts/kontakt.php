<?php
if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['betreff']) && isset($_POST['text'])){
    echo 'Nachricht erfolgreich verschickt. Zurück zur <a href="../index.php">Startseite</a>';
}
else {
    echo 'Fehler beim Versenden. Zurück zur <a href="../index.php">Startseite</a>';
}
?>
