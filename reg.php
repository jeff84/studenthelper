<html>
<head>
    <script type="text/javascript">
    <!--
    setTimeout("self.location.href='index.php'",10000);
    //-->
    </script>
</head>
<body>
<?php
session_start();
require('class/class.database.php');
require('class/class.validate.php');
require('auth/pass-md5.php');
$db = new Database();
$Val = new Validate();
if ($_SESSION['token'] == $_POST['token']){
    if ($_POST['pass'] == $_POST['passcon']){
        if ($Val->validnick($_POST['nick'])){
            if ($Val->isemail($_POST['email'])){
                $where['email'] = $_POST['email'];
                $usq = $db->select("id", "user", $where);
                if ($usq->rowCount() == 0){
                    if (!$Val->existnick($_POST['nick'], $db)){
                        $what['nick'] = $_POST['nick'];
                        $what['email'] = $_POST['email'];
                        $what['vorname'] = $_POST['vname'];
                        $what['name'] = $_POST['name'];
                        $what['pass'] = pass_md5($_POST['email'], $_POST['pass']);
                        $what['hochschulid'] = $_POST['hochschule'];
                        if ($db->insert("user", $what)){
                            echo 'Erfolgreich registriert';
                        }
                    }
                    else {
                        echo 'Nickname schon vergeben!';
                        foreach($_POST AS $key => $val){
                            $_SESSION['post'][$key] = $_POST[$key];
                        }
                    }
                }
                else {
                    echo 'Mail-Adresse schon registriert!';
                    foreach($_POST AS $key => $val){
                        $_SESSION['post'][$key] = $_POST[$key];
                    }
                }
            }
            else {
                echo 'Keine gültige Mail-Adresse!';
                foreach($_POST AS $key => $val){
                    $_SESSION['post'][$key] = $_POST[$key];
                }
            }
        }
        else {
            echo 'Im Nick sind nur Buchstaben, Zahlen, - und _ erlaubt. Maximale Länge: 20';
            foreach($_POST AS $key => $val){
                $_SESSION['post'][$key] = $_POST[$key];
            }
        }
    }
    else {
        echo "Passwörter nicht identisch";
        foreach($_POST AS $key => $val){
            $_SESSION['post'][$key] = $_POST[$key];
        }
    }
}
else {
    echo "Fehler!";
}
?>
</body>
</html>
