<html>
<head>
    <script type="text/javascript">
    <!--
    setTimeout("self.location.href='../index.php'",2000);
    //-->
    </script>
</head>
<body>
<?php
session_start();
$sid = session_id();
require('../class/class.database.php');
require('../auth/pass-md5.php');
$db = new Database();
if (isset($_POST['passwd']) && ($_SESSION['token'] == $_POST['token'])){
    if (preg_match('/@/', $_POST["user"])){
        $userwhere['email'] = $_POST['user'];
    }
    else {
        $userwhere['nick'] = $_POST['user'];
    }
    $usq = $db->select("`id`, `nick`, `email`, `pass`", "user", $userwhere);
    if ($usq->rowCount() == 1){
	    $erg = $usq->fetchObject();
	    if (pass_md5($erg->email, $_POST['passwd']) == $erg->pass){
	        session_regenerate_id(true);
	        $finger = pass_md5($_SERVER['HTTP_USER_AGENT'], substr($_SERVER["REMOTE_ADDR"],0,7));
	        $_SESSION['finger'] = $finger;
	        $_SESSION['logedin'] = true;
	        $_SESSION['user'] = $erg->email;
	        $_SESSION['usernick'] = $erg->nick;
	        $_SESSION['userid'] = $erg->id;
	        $_SESSION['time'] = time();
	        echo 'Login erfolgreich. </br>
	            Falls sie nicht weitergeleitet werden, gehen sie <a href="../index.php">zurück zu Home</a>';
	    }
	    else {
	        echo 'Login nicht erfolgreich. Überprüfen sie den Benutzernamen und das Passwort';
	    }
	}
	else {
	    echo 'Login nicht erfolgreich. Überprüfen sie den Benutzernamen und das Passwort';
	}
}
elseif (isset($_POST['logout'])){
    if ($_POST['logout'] == "true"){
        session_destroy();
        echo 'Logout erfolgreich. </br>
	       Falls sie nicht weitergeleitet werden, gehen sie <a href="../index.php">zurück zu Home</a>';
    }
}
else {
    echo "Fehler";
}
?>
</body>
</html>
