<?php 
if ($logedin){
    for ($x = 0; $x < 3; $x++){
        $class["$x"] = "";
    }
    if (!isset($_GET['n']) || ($_GET['n'] == "inbox")){
        $class["0"] = ' class="sie-sind-hier"';
    }
    elseif ($_GET['n'] == "outbox"){
        $class["1"] = ' class="sie-sind-hier"';
    }
    elseif ($_GET['n'] == "neuenachricht"){
        $class["2"] = ' class="sie-sind-hier"';
    }
    echo '<div id="mailbox">
            <div id="mailnav">
				<ul>';
					echo '<li'.$class["0"].'><a href="index.php?l=nachrichten&n=inbox">Inbox</a></li>';
					echo '<li'.$class["1"].'><a href="index.php?l=nachrichten&n=outbox">Outbox</a></li>';
					echo'<li'.$class["2"].'><a href="index.php?l=nachrichten&n=neuenachricht">Neue Nachricht</a></li>
				</ul>
            </div>';
                if (!isset($_GET['n']) || ($_GET['n'] == "inbox")){
                    echo '<div id="mails" class="content">';
					require("content/inbox.php");
					echo '</div>';
                }
                elseif ($_GET['n'] == "outbox"){
					echo '<div id="mails" class="content">';
                    require("content/outbox.php");
					echo '</div>';
                }
                elseif ($_GET['n'] == "neuenachricht"){
                    require("content/neuenachricht.php");
                }
        echo '</div>';
}
else {
    echo "Bitte loggen sie sich ein um ihre Nachrichten sehen zu können";
}

?>
