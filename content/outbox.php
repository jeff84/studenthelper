<?php 
if ($logedin){
    unset($where);
    $where['uservid'] = $_SESSION['userid'];
    $stmt = $db->select("*", "nachrichten", $where);
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
            $id['id'] = $ergarr[$start]->useraid;
            $uisq = $db->select("nick", "user", $id);
            $uierg = $uisq->fetchObject();    
            echo '<div id="messagecontainer">
                    <div id="messagehead">';
            if ($ergarr[$start]->gelesen == 0){
                echo 'Ungelesen: ';
            }
            $lin = '';
            if (isset($_GET['seite'])){
                $lin = '&seite='.$seite;
            }
            echo '<a href="index.php?l=nachrichten&n=outbox'.$lin.'&mid='.$ergarr[$start]->id.'">'.$ergarr[$start]->betreff.'</a></br>';
            $datum = explode("-", $ergarr[$start]->datetime);
            echo 'Am: '.$datum["2"].'.'.$datum["1"].'.'.$datum["0"].' '.$datum["3"].':'.$datum["4"].' ';
            echo 'an: '.$uierg->nick;
            echo '</div>';
            if (isset($_GET["mid"]) && ($_GET["mid"] == $ergarr[$start]->id)){
                echo '<br/><div id="messagebody">'.$ergarr[$start]->text.'</div>';
            }
            echo '</div>';
        }
        echo '<div id="seite">';
        if (isset($_GET['n'])){
                $link = '&n='.$_GET['n'];
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
}
?>
