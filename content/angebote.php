<?php
$neu = "";
for ($x = 0; $x < 2; $x++){
    $class["$x"] = "";
}
if (!isset($_GET['a']) || ($_GET['a'] == "angebote")){
        $class["0"] = ' class="sie-sind-hier"';
    }
    elseif ($_GET['a'] == "nangebot"){
        $class["1"] = ' class="sie-sind-hier"';
    }
if ($logedin){
    $neu = '<li'.$class["1"].'><a href="index.php?l=angebote&a=nangebot">Neues Angebot</a></li>';
}
echo '<div id="anfragecontainer">
        <div id="anfragenav">
            <ul>
			    <li'.$class["0"].'><a href="index.php?l=angebote&a=angebote">Angebote</a></li>'.$neu.'
			</ul>
        </div>
        ';
        if (!isset($_GET['a']) || ($_GET['a'] == "angebote")){
			echo '<div id="anfragen" class="content">';
            require('content/nachhilfe.php');
			echo '</div>';
        }
        elseif ($_GET['a'] == "nangebot"){
            require('content/neuesangebot.php');
        }
        echo '
    </div>';


?>
