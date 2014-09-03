<?php
if ($logedin == true){
    echo '<form id="login" class="contentright" action="scripts/login.php" method="post">
        Sie sind eingeloggt '.$_SESSION['usernick'].'</br>
        Neue Nachrichten: <a href="index.php?l=nachrichten&n=inbox">'.$news.'</a></br>
        <input type="hidden" name="logout" value="true"></br>
        <input type="submit" name="log" value="Logout" class="button"></form>';
}
else {
    echo '<form id="login" class="contentright" action="scripts/login.php" method="post">
        Login<br/>
        <input type="text" name="user" class="login" /><br/>
        <input type="password" name="passwd" class="login" /><br/>
        <input type="hidden" name="token" value="'.csrf_token().'">
		<a href="index.php?l=register" id="reg">Registrieren</a>
        <input type="submit" name="log" value="Einloggen" class="button" />
        </form>';
}
?>
