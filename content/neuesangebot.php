<?php 
if ($logedin){
    if ($_GET['a'] == 'nangebot'){
        $typ = 0;
    }
    elseif ($_GET['a'] == 'nanfrage'){
        $typ = 1;
    }
    $usq = $db->select('id, name', 'ort');
    echo '<form id="angform" action="scripts/newang.php" method="post" class="formwide">
        <label for="fach" class="labelan">Fach</label><input type="text" name="fach" value="" class="inputan" /><br/>
        <label for="zeitraum" class="labelan">Zeitraum</label><input type="text" name="zeitraum" value="" class="inputan" /><br/>
        <label for="ort" class="labelan">Ort</label><select name="ort" size="1" class="selectan">
        <option value="0"></option>';
    while ($erg = $usq->fetchObject()){
        echo '<option value="'.$erg->id.'">'.$erg->name.'</option>';
    }
    echo '</select><br/>
        Tage </br>
        <input type="checkbox" name="tag[]" value="mo" />Mo 
        <input type="checkbox" name="tag[]" value="di" />Di 
        <input type="checkbox" name="tag[]" value="mi" />Mi 
        <input type="checkbox" name="tag[]" value="do" />Do 
        <input type="checkbox" name="tag[]" value="fr" />Fr 
        <input type="checkbox" name="tag[]" value="sa" />Sa 
        <input type="checkbox" name="tag[]" value="so" />So </br>
        Text <br/><textarea name="text" cols="50" rows="10" class="textan"></textarea>
        <input type="hidden" name="typ" value="'.$typ.'">
        <input type="hidden" name="token" value="'.csrf_token().'"><br/>
        <input type="submit" name="Abschicken" value="Abschicken" class="button">
        </form>';
}

?>
