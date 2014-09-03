<?php
if ((!isset($_GET['s'])) || ($_GET['s'] == 'anfragen')){
    $typ = 1;
}
elseif ($_GET['s'] == 'angebote'){
    $typ = 0;
}
$usq = $db->select('id, name', 'ort');
echo '<form id="suche" class="contentleft" action="index.php?l=such" method="post">
        <label for="fach" class="labelhome">Fach</label><input type="text" name="fach" id="fach" class="floatedByLabel inputhome" /><br/>
        <label for="ort" class="labelhome">Ort</label><select name="ort" size="1" id="ort" class="floatedByLabel selecthome">
        <option value="0"></option>';
    while ($erg = $usq->fetchObject()){
        echo '<option value="'.$erg->id.'">'.$erg->name.'</option>';
    }
    echo '</select><br/>';
    echo '<input type="hidden" name="typ" value="'.$typ.'">
        <input type="hidden" name="token" value="'.csrf_token().'">
	    <input type="submit" name="search" value="Suchen" class="button" />
        </form>';
?>
