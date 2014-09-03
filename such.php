<?php 
$search['fach'] = '%'.$_POST['fach'].'%';
$search['typ'] = $_POST['typ'];
if ($_POST['ort'] != 0){
    $search['ortid'] = $_POST['ort'];
}
echo '<div class="content">';
$usq = $db->select('id, name', 'ort');
echo '<form id="such" action="index.php?l=such" method="post">
        Fach:<input type="text" name="fach" value="'.$_POST['fach'].'"/> Ort: <select name="ort" size="1"><option value="0"></option>';
while ($erg = $usq->fetchObject()){
    $sel = '';
    if ($erg->id == $_POST['ort']){
        $sel = ' selected';
    }
    echo '<option value="'.$erg->id.'"'.$sel.'>'.$erg->name.'</option>';
}
echo '</select>';
$An[0] = 'Angebote';
$An[1] = 'Anfragen';
echo 'Typ: <select name="typ" size="1">';
for ($i = 0; $i < 2; $i++){
    $sel = '';
    if ($_POST['typ'] == $i){
        $sel = ' selected';
    }
    echo '<option value="'.$i.'"'.$sel.'>'.$An[$i].'</option>';
}
if ($_POST['typ'] == $i){
    $sel = 'selected';
}
echo '<input type="hidden" name="token" value="'.csrf_token().'">
   <input type="submit" name="search" value="Suchen" />
   </form>';
$stmt = $db->search('*', 'nachhilfe', $search);
while ($erg = $stmt->fetchObject()){
    unset($where);
    $where['id'] = $erg->userid;
    $uisq = $db->select("nick", "user", $where);
    $uierg = $uisq->fetchObject();    
    echo '<div id="nachhilfecontainer">
            <div id="nachhilfehead">';
    echo 'Nachhilfe in: ';
    $link = "";
    if ($_POST['typ'] == 0){
        $link = 'angebote';
    }
    elseif ($_POST['typ'] == 1){
        $link = 'anfragen';
    }
    echo '<a href="index.php?l='.$link.'&nachid='.$erg->id.'">'.$erg->fach.'</a></br>';
    $datum = explode("-", $erg->datetime);
    echo 'Erstellt: '.$datum["2"].'.'.$datum["1"].'.'.$datum["0"].' '.$datum["3"].':'.$datum["4"].' ';
    echo 'von: '.$uierg->nick.'<br/>';
    echo 'ab: '.$erg->zeitraum.'<br/>';
    $tag = '';
    $tage = explode(';', $erg->tage);
    for ($i = 0; $i < count($tage); $i++){
        $tag .= ', '.$tage[$i];
    }
    echo 'Tage: '.substr($tag, 2);
    echo '</div>';
    if (isset($_GET["nachid"]) && ($_GET["nachid"] == $erg->id)){
        echo '<div id="nachhilfebody">'.$erg->text.'</div>';
        if ($logedin){
            echo '<div id="nachricht">
                <form id="mesform" action="scripts/mess.php" method="post">
                    Empfänger: '.$uierg->nick.'<input type="hidden" name="nick" value="'.$uierg->nick.'"/><br/>
                    Betreff: '.$erg->fach.'<input type="hidden" name="betreff" value="Re: '.$erg->fach.'"/><br/>
                    Nachricht: <br/><textarea name="text" cols="50" rows="10"></textarea>
                    <input type="hidden" name="token" value="'.csrf_token().'">
                    <input type="submit" name="Abschicken" value="Abschicken">
                </form>
                </div>';
        }
    }
    echo '</div>';
}
echo '</div>';
?>
