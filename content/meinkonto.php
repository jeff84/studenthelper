<?php
if ($logedin){
    for ($x = 0; $x < 4; $x++){
        $class["$x"] = "";
    }
    if (!isset($_GET['a']) || ($_GET['a'] == "angebote")){
        $class["0"] = ' class="sie-sind-hier"';
    }
    elseif ($_GET['a'] == "anfragen"){
        $class["1"] = ' class="sie-sind-hier"';
    }
    elseif ($_GET['a'] == "nangebot"){
        $class["2"] = ' class="sie-sind-hier"';
    }
    elseif ($_GET['a'] == "nanfrage"){
        $class["3"] = ' class="sie-sind-hier"';
    }
    echo '<div id="meinkonto">
            <div id="meinkontonav">
			    <ul>';
				    echo '<li'.$class["0"].'><a href="index.php?l=meinkonto&a=angebote">Meine Angebote</a></li>';
                    echo '<li'.$class["1"].'><a href="index.php?l=meinkonto&a=anfragen">Meine Anfragen</a></li>';
                    echo '<li'.$class["2"].'><a href="index.php?l=meinkonto&a=nangebot">Neues Angebot</a></li>';
                    echo '<li'.$class["3"].'><a href="index.php?l=meinkonto&a=nanfrage">Neue Anfrage</a></li>
				</ul>
            </div>
            ';
            if (!isset($_GET['a']) || ($_GET['a'] == "angebote") || ($_GET['a'] == 'anfragen')){
                echo '<div id="anganf" class="content">';
				require('content/nachhilfe.php');
				echo '</div>';
            }
            elseif ($_GET['a'] == "nangebot"){
                require('content/neuesangebot.php');
            }
            elseif ($_GET['a'] == "nanfrage"){
                require('content/neuesangebot.php');
            }
        echo '</div>';
    
}
else {
    echo "Bitte loggen sie sich ein um ihre Seite sehen zu können";
}

?>
