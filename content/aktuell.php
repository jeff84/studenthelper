<?php 
unset($where);
$where['typ'] = 0;
$where['erledigt'] = 0;
$order[0] = 'datetime';
$order[1] = 'DESC';
$limit = true;
$stmt = $db->select("*", "nachhilfe", $where, $order, $limit);
echo '<h3>aktuelle Angebote</h3>';
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
    echo '<a href="index.php?l=angebote'.$link.'&nachid='.$erg->id.'">'.$erg->fach.'</a></br>';
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
    echo '</div></div>';
}
echo '<br/><br/><h3>aktuelle Anfragen</h3>';
unset($where);
$where['typ'] = 1;
$where['erledigt'] = 0;
$stmt = $db->select("*", "nachhilfe", $where, $order, $limit);
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
    echo '<a href="index.php?l=anfragen'.$link.'&nachid='.$erg->id.'">'.$erg->fach.'</a></br>';
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
    echo '</div></div>';
}
?>
