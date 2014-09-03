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
$stmt = $db->select("*", "nachhilfe", $where);
while ($erg = $stmt->fetchObject()){
    unset($where);
    $where['id'] = $erg->userid;
    $uisq = $db->select("nick", "user", $where);
    $uierg = $uisq->fetchObject();    
    echo '<div id="nachhilfecontainer">
            <div id="nachhilfehead">';
    echo 'Nachhilfe in: ';
    $link = "";
    if (isset($_GET['a'])){
        $link = '&a='.$_GET['a'];
    }
    echo '<a href="index.php?l='.$_GET['l'].$link.'&nachid='.$erg->id.'">'.$erg->fach.'</a></br>';
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
        echo '<br/><div id="nachhilfebody">'.$erg->text.'</div>';
        if ($logedin){
            echo '<br><div id="nachricht">
                <form id="mesform" action="scripts/mess.php" method="post" class="formwiden">
                    Empfänger: '.$uierg->nick.'<input type="hidden" name="nick" value="'.$uierg->nick.'"/><br/>
                    Betreff: '.$erg->fach.'<input type="hidden" name="betreff" value="Re: '.$erg->fach.'"/><br/>
                    Nachricht: <br/><textarea name="text" cols="50" rows="10" class="textn"></textarea>
                    <input type="hidden" name="token" value="'.csrf_token().'"><br/>
                    <input type="submit" name="Abschicken" value="Abschicken" class="button">
                </form>
                </div>';
        }
    }
    echo '</div>';
}
?>
