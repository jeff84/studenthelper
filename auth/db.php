<?php
	$dbuser = 'USER';
	$dbhost = 'localhost';
	$dbpass = 'PASS';
	$dbdb = 'DB';
	try {
	    $db = new PDO('mysql:host=localhost;dbname=DB', $dbuser, $dbpass);
    }
    catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
    $stmt = $db->prepare('SET NAMES utf8');
    $stmt->execute();
    $stmt = $db->prepare('SET CHARACTER SET utf8');
    $stmt->execute();
?>
