<?php 
if ($logedin){
    unset($where);
    $where['useraid'] = $_SESSION['userid'];
    $order[0] = 'id';
    $order[1] = 'DESC';
    $stmt = $db->select("*", "nachrichten", $where, $order);
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
            $where['id'] = $ergarr[$start]->uservid;
            $uisq = $db->select("nick", "user", $where);
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
            echo '<a href="index.php?l=nachrichten&n=inbox'.$lin.'&mid='.$ergarr[$start]->id.'">'.$ergarr[$start]->betreff.'</a></br>';
            $datum = explode("-", $ergarr[$start]->datetime);
            echo 'Am: '.$datum["2"].'.'.$datum["1"].'.'.$datum["0"].' '.$datum["3"].':'.$datum["4"].' ';
            echo 'von: '.$uierg->nick;
            echo '</div>';
            if (isset($_GET["mid"]) && ($_GET["mid"] == $ergarr[$start]->id)){
                echo '<br/><div id="messagebody">'.$ergarr[$start]->text.'</div>';
                $set['gelesen'] = 1;
                unset($where);
                $where['id'] = $ergarr[$start]->id;
                $db->update("nachrichten", $set, $where);
                echo '<br/><div id="antwort">
                    <form id="mesform" action="scripts/mess.php" method="post" class="formwiden">
                        Empfänger: '.$uierg->nick.'<input type="hidden" name="nick" value="'.$uierg->nick.'"/><br/>
                        Betreff: Re:'.$ergarr[$start]->betreff.'<input type="hidden" name="betreff" value="Re: '.$ergarr[$start]->betreff.'"/><br/>
                        Nachricht: <br/><textarea name="text" cols="50" rows="10" class="textn"></textarea>
                        <input type="hidden" name="token" value="'.csrf_token().'">
                        <br/><input type="submit" name="Abschicken" value="Abschicken" class="button">
                    </form>
                    </div>';
            }
            echo '</div>';
        }
        echo '<div id="seite">';
        $link = '';
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
}   
?>
