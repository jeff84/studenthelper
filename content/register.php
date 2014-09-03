<?php
if ($logedin){
    echo "Sie sind bereits eingeloggt";
}
else {
    $usq = $db->select('id, name', 'hochschule');
    if (isset($_SESSION['post']['email'])){
        $sesemail = $_SESSION['post']['email'];
    }
    else {
        $sesemail = "";
    }
    if (isset($_SESSION['post']['nick'])){
        $sesnick = $_SESSION['post']['nick'];
    }
    else {
        $sesnick = "";
    }
    if (isset($_SESSION['post']['vname'])){
        $sesvname = $_SESSION['post']['vname'];
    }
    else {
        $sesvname = "";
    }
    if (isset($_SESSION['post']['name'])){
        $sesname = $_SESSION['post']['name'];
    }
    else {
        $sesname = "";
    }
    echo '<form id="regform" action="scripts/reg.php" method="post" class="formwide">
	    
        <label for="nick">Nickname</label><input type="text" name="nick" value="'.$sesnick.'" id="nick" class="floatedByLabel input" /><br/>
        <label for="mail">eMail-Adresse</label><input type="text" name="email" value="'.$sesemail.'" id="mail" class="floatedByLabel input" /><br/>
        <label for="vn">Vorname</label><input type="text" name="vname" value="'.$sesvname.'" id="vn" class="floatedByLabel input" /><br/>
        <label for="nn">Nachname</label><input type="text" name="name" value="'.$sesname.'" id="nn" class="floatedByLabel input" /><br/>
        <label for="pw">Passwort</label><input type="password" name="pass" id="pw" class="floatedByLabel input" /><br/>
        <label for="pww">Passwort wiederholen</label><input type="password" name="passcon" id="pww" class="floatedByLabel input" /><br/>
        <label for="hs">Hochschule</label><select name="hochschule" size="1" id="hs" class="floatedByLabel" >
        <option value="0"></option>';
    while ($erg = $usq->fetchObject()){
        echo '<option value="'.$erg->id.'">'.$erg->name.'</option>';
    }
    echo '</select><br/>
        <input type="hidden" name="token" value="'.csrf_token().'">
        <input type="submit" name="Anmelden" value="Anmelden" class="button">
        </form>';
    if (isset($_SESSION['post'])){
        unset($_SESSION['post']);
    }
}
?>
