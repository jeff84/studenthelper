<?php
$neu = "";
for ($x = 0; $x < 2; $x++){
    $class["$x"] = "";
}
if (!isset($_GET['a']) || ($_GET['a'] == "anfragen")){
        $class["0"] = ' class="sie-sind-hier"';
    }
    elseif ($_GET['a'] == "nanfrage"){
        $class["1"] = ' class="sie-sind-hier"';
    }
if ($logedin){
    $neu = '<li'.$class["1"].'><a href="index.php?l=anfragen&a=nanfrage">Neue Anfrage</a></li>';
}
echo '<div id="anfragecontainer">
        <div id="anfragenav">
            <ul>
			    <li'.$class["0"].'><a href="index.php?l=anfragen&a=anfragen">Anfragen</a></li>'.$neu.'
			</ul>
        </div>
        ';
        if (!isset($_GET['a']) || ($_GET['a'] == "anfragen")){
			echo '<div id="anfragen" class="content">';
            require('content/nachhilfe.php');
			echo '</div>';
        }
        elseif ($_GET['a'] == "nanfrage"){
            require('content/neuesangebot.php');
        }
        echo '
    </div>';


?>
