<?php 
class Validate {

    public function safertext($text){
        $suche[0] = '/\&/';
        $ersetze[0] = '&amp;';
        $suche[1] = '/</';
        $ersetze[1] = '&lt;';
        $suche[2] = '/>/';
        $ersetze[2] = '&gt;';
        $suche[3] = "/\'/";
        $ersetze[3] = "&#39;";
        $suche[4] = '/\"/';
        $ersetze[4] = "&quot;";
        $neuertext = preg_replace($suche, $ersetze, $text);
        return $neuertext;
    }

    public function validnick($nick){
        if (preg_match('/^[a-z0-9\-\._]{2,20}$/i' , $nick)){
            return true;
        }
        else {
            return false;
        }
    }
    
    public function isemail($email){
        if (preg_match('/[a-z0-9\.\-_]+@[a-z0-9\.\-_]+\.[a-z0-9]{2,}/i', $email)){
            return true;
        }
        else {
            return false;
        }
    }
    
    public function onlytext($text){
        if (preg_match('/^[a-z0-9\-._: ]+$/i', $text)){
            return true;
        }
        else {
            return false;
        }
    }

    public function existnick($nick, $db){
        $where['nick'] = $nick;
        $nsq = $db->select("id", "user", $where);
        if ($nsq->rowCount() == 1){
            return true;
        }
        else {
            return false;
        }
    }    

}

?>
