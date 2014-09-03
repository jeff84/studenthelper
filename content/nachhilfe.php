<?php 
unset($where);
if ($_GET['l'] == 'anfragen'){
    $where['typ'] = 1;
}
elseif ($_GET['l'] == 'angebote'){
    $where['typ'] = 0;
}
elseif ((($_GET['l'] == 'meinkonto') && !isset($_GET['a'])) || (($_GET['l'] == 'meinkonto') && ($_GET['a'] == 'angebote'))){
    $where['typ'] = 0;
    $where['userid'] = $_SESSION['userid'];
}
elseif (($_GET['l'] == 'meinkonto') && ($_GET['a'] == 'anfragen')){
    $where['userid'] = $_SESSION['userid'];
    $where['typ'] = 1;
}
$where['erledigt'] = 0;
$order[0] = 'id';
$order[1] = 'DESC';
$stmt = $db->select("*", "nachhilfe", $where, $order);
$anzahl = $stmt->rowCount();
if ($anzahl == 0){
    echo '<div id="nachhilfecontainer">Keine Einträge vorhanden</div>';
}
else {
    for ($x = 0; $x < $anzahl; $x++){
        $ergarr[$x] = $stmt->fetchObject();
    }
    $seiten = intval($anzahl/10);
    if (($anzahl%10) > 0){
        $seiten += 1;
    }
    if (!isset($_GET['seite'])){
        $seite = 1;
    }
    else {
        $seite = $_GET['seite'];
    }
    $start = ($seite*10)-10;
    if ($anzahl > $start+10){
        $ende = $start+10;
    }
    else {
        $ende = $anzahl;
    }
    for ($start; $start < $ende; $start++){
        unset($where);
        $where['id'] = $ergarr[$start]->userid;
        $uisq = $db->select("nick", "user", $where);
        $uierg = $uisq->fetchObject();    
        echo '<div id="nachhilfecontainer">
                <div id="nachhilfehead">';
        echo 'Nachhilfe in: ';
        $link = "";
        $lin = '';
        if (isset($_GET['a'])){
            $link = '&a='.$_GET['a'];
        }
        if (isset($_GET['seite'])){
                $lin = '&seite='.$seite;
            }
        echo '<a href="index.php?l='.$_GET['l'].$lin.$link.'&nachid='.$ergarr[$start]->id.'">'.$ergarr[$start]->fach.'</a></br>';
        $datum = explode("-", $ergarr[$start]->datetime);
        echo 'Erstellt: '.$datum["2"].'.'.$datum["1"].'.'.$datum["0"].' '.$datum["3"].':'.$datum["4"].' ';
        echo 'von: '.$uierg->nick.'<br/>';
        echo 'ab: '.$ergarr[$start]->zeitraum.'<br/>';
        $tag = '';
        $tage = explode(';', $ergarr[$start]->tage);
        for ($i = 0; $i < count($tage); $i++){
            $tag .= ', '.$tage[$i];
        }
        echo 'Tage: '.substr($tag, 2);
        echo '</div>';
        if (isset($_GET["nachid"]) && ($_GET["nachid"] == $ergarr[$start]->id)){
            echo '<br/><div id="nachhilfebody">'.$ergarr[$start]->text.'</div>';
            if ($logedin){
                if ($ergarr[$start]->userid == $_SESSION['userid']){
                    echo '<form id="loeschen" action="scripts/loeschen.php" method="post">
                        <input type="hidden" name="token" value="'.csrf_token().'">
                        <input type="hidden" name="id" value="'.$ergarr[$start]->id.'">
                        <input type="submit" name="loeschen" value="Löschen" class="button"></form>';
                }
                else {
                    echo '<br><div id="nachricht">
                        <form id="mesform" action="scripts/mess.php" method="post" class="formwiden">
                            Empfänger: '.$uierg->nick.'<input type="hidden" name="nick" value="'.$uierg->nick.'"/><br/>
                            Betreff: '.$ergarr[$start]->fach.'<input type="hidden" name="betreff" value="Re: '.$ergarr[$start]->fach.'"/><br/>
                            Nachricht: <br/><textarea name="text" cols="50" rows="10" class="textn"></textarea>
                            <input type="hidden" name="token" value="'.csrf_token().'"><br/>
                            <input type="submit" name="Abschicken" value="Abschicken" class="button">
                        </form>
                        </div>';
                }
            }
        }
        echo '</div>';
    }
    echo '<div id="seite">';
    if (isset($_GET['a'])){
            $link = '&a='.$_GET['a'];
        }
    if ($seite > 1){
        echo '<a href="index.php?l='.$_GET['l'].$link.'&seite='.($seite-1).'">vorherige</a> ';
    }
    echo 'Seite: '.$seite.'/'.$seiten;
    if ($seite < $seiten){
        echo ' <a href="index.php?l='.$_GET['l'].$link.'&seite='.($seite+1).'">nächste</a>';
    }
    echo '</div>';
}
?>
