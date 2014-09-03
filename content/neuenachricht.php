<?php 
if ($logedin){
    echo '<form id="mesform" action="scripts/mess.php" method="post" class="formwide">
        <label for="nick" class="labeln">Empfänger</label><input type="text" name="nick" class="inputn" /><br/>
        <label for="betreff" class="labeln">Betreff</label><input type="text" name="betreff" class="inputn" /><br/>
        <label for="text" class="labeln">Nachricht</label><br/><textarea name="text" cols="50" rows="10"  class="textn"></textarea>
        <input type="hidden" name="token" value="'.csrf_token().'">
        <br/><input type="submit" name="Abschicken" value="Abschicken" class="button">
        </form>';
}
?>

