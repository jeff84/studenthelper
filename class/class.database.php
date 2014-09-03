<?php

class Database {
    private $dbuser = 'swa3';
	private $dbhost = 'localhost';
	private $dbpass = 'Shaim6ie';
	private $dbdb = 'swa3';
	
	public function __construct(){
	    try {
	        $this->db = new PDO('mysql:host=localhost;dbname='.$this->dbdb, $this->dbuser, $this->dbpass);
	        $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
	        $stmt = $this->db->prepare('SET NAMES utf8');
	        $stmt->execute();
	        $stmt = $this->db->prepare('SET CHARACTER SET utf8');
	        $stmt->execute();
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
	}
	
	public function select($what, $tabname, $where = null, $order = null, $limit = null){
	    try {
	        if (!$where){
	            $sql = "SELECT $what FROM $tabname";
	            $stmt = $this->db->prepare($sql);
	            $stmt->execute();
	        }
	        else {
	            $wherecond = "";
                foreach ($where AS $key => $val){
                    $wherecond .= ' AND `'.$key.'`=:'.$key;
                }
                if (!$order && !$limit){
	                $sql = "SELECT $what FROM `$tabname` WHERE ".substr($wherecond, 5);
	                $stmt = $this->db->prepare($sql);
	            }
	            elseif ($order && !$limit){
	                if (count($order) == 2){
	                    $ad = $order[1];
	                }
	                else {
	                    $ad = 'ASC';
	                }
	                $sql = "SELECT $what FROM `$tabname` WHERE ".substr($wherecond, 5)." ORDER BY $order[0] $ad";
	                $stmt = $this->db->prepare($sql);
	            }
	            elseif ($order && $limit){             
	                if (count($order) == 2){
	                    $sql = "SELECT $what FROM `$tabname` WHERE ".substr($wherecond, 5)." ORDER BY `$order[0]` $order[1] LIMIT 0,3";
	                }
	                else {
	                    $sql = "SELECT $what FROM `$tabname` WHERE ".substr($wherecond, 5)." ORDER BY `$order[0]` ASC LIMIT 0,3";
	                }
	                $stmt = $this->db->prepare($sql);
	            }
	            foreach ($where AS $key => $val){
	                $stmt->bindParam(':'.$key, $where[$key]);
	            }
	            $stmt->execute();
	        }
	        return $stmt;
	    }
	    catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
	}
	
	public function insert($tabname, $what){
	    try {
	        $whatk = "";
	        $whatv = "";
	        foreach($what AS $key => $val){
	            $whatk .= ", `".$key."`";
	            $whatv .= ", :".$key;
	        }
	        $sql = "INSERT INTO `$tabname` (".substr($whatk, 2).") VALUES (".substr($whatv, 2).")";
	        $stmt = $this->db->prepare($sql);
	        foreach($what AS $key => $val){
	            $stmt->bindParam(':'.$key, $what[$key]);
	        }
	        $stmt->execute();
	        return true;
	    }
	    catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    public function update($tabname, $set, $where){
        try {
            $sett = "";
            foreach($set AS $key => $val){
                $sett .= ", ".$key."=:".$key;
            }
            $wherecond = "";
            foreach($where AS $key => $val){
                $wherecond .= " AND `".$key."`=:".$key;
            }
            $sql = "UPDATE $tabname SET ".substr($sett, 2)." WHERE ".substr($wherecond, 5);
            $stmt = $this->db->prepare($sql);
            foreach($set AS $key => $val){
                $stmt->bindParam(':'.$key, $set[$key]);
            }
            foreach ($where AS $key => $val){
	            $stmt->bindParam(':'.$key, $where[$key]);
	        }
            if ($stmt->execute()){
                return true;
            }
            else {
                return false;
            }
        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function search($what, $tabname, $search, $order = null, $limit = null){
        try {
	        $wherecond = "";
            foreach ($search AS $key => $val){
                $wherecond .= ' AND `'.$key.'`LIKE :'.$key;
            }
            if (!$order && !$limit){
	            $sql = "SELECT $what FROM `$tabname` WHERE ".substr($wherecond, 5);
	            $stmt = $this->db->prepare($sql);
	        }
	        elseif ($order && !$limit){
	            $sql = "SELECT $what FROM `$tabname` WHERE ".substr($wherecond, 5)." ORDER BY :order :ad";
	            $stmt = $this->db->prepare($sql);
	            $stmt->bindParam(':order', $order[0]);
	            if (count($order) == 2){
	                $stmt->bindParam(':ad', $order[1]);
	            }
	            else {
	                $ad = 'ASC';
	                $stmt->bindParam(':ad', $ad);
	            }
	        }
	        elseif ($order && $limit){             
	            if (count($order) == 2){
	                $sql = "SELECT $what FROM `$tabname` WHERE ".substr($wherecond, 5)." ORDER BY `$order[0]` $order[1] LIMIT 0,5";
	            }
	            else {
	                $sql = "SELECT $what FROM `$tabname` WHERE ".substr($wherecond, 5)." ORDER BY `$order[0]` ASC LIMIT 0,5";
	            }
	            $stmt = $this->db->prepare($sql);
	        }
	        foreach ($search AS $key => $val){
	            $stmt->bindParam(':'.$key, $search[$key]);
	        }
	        $stmt->execute();
	        return $stmt;
	    }
	    catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}


?>
