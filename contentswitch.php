<?php
    if (!isset($_GET['l']) || ($_GET['l'] == "home")){
        require("content/home.php");
    }
    elseif ($_GET['l'] == "anfragen"){
        require("content/anfragen.php");
    }
    elseif ($_GET['l'] == "angebote"){
        require("content/angebote.php");
    }
    elseif ($_GET['l'] == "meinkonto"){
        require("content/meinkonto.php");
    }
    elseif ($_GET['l'] == "hilfe"){
        require("content/hilfe.php");
    }
    elseif ($_GET['l'] == "nachrichten"){
        require("content/nachrichten.php");
    }
    elseif ($_GET['l'] == "about"){
        require("content/about.php");
    }
    elseif ($_GET['l'] == "agb"){
        require("content/agb.php");
    }
    elseif ($_GET['l'] == "impressum"){
        require("content/impressum.php");
    }
    elseif ($_GET['l'] == "kontakt"){
        require("content/kontakt.php");
    }
    elseif ($_GET['l'] == "register"){
        require("content/register.php");
    }
    elseif ($_GET['l'] == "such"){
        require("such.php");
    }
    
?>
