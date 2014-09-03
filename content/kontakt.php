<?php
    echo '<form id="regform" action="scripts/kontakt.php" method="post" class="formwide">
		<h2>Kontaktformular</h2>
        <label for="mail" class="labelk">eMail-Adresse</label><input type="text" name="email" value="" id="mail" class="floatedByLabel input" /><br/>
        <label for="name" class="labelk">Name</label><input type="text" name="name" value="" id="vn" class="floatedByLabel input" /><br/>
		<label for="betreff" class="labelk">Betreff</label><input type="text" name="betreff" value="" id="vn" class="floatedByLabel input" /><br/>
		<br/>Text<br/><textarea name="text" cols="50" rows="10" class="textk"></textarea>
        <input type="hidden" name="token" value="'.csrf_token().'">
        <br/><input type="submit" name="Abschicken" value="Abschicken" class="button">
        </form>';
?>
