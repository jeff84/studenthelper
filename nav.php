<?php
if (!isset($_GET['l']) || ($_GET['l'] == "home")){
    echo '<li class="sie-sind-hier"><a href="index.php?l=home">Home</a></li>';
    echo '<li><a href="index.php?l=anfragen">Anfragen</a></li>';
    echo '<li><a href="index.php?l=angebote">Angebote</a></li>';
    echo '<li><a href="index.php?l=meinkonto">Mein Konto</a></li>';
    echo '<li><a href="index.php?l=hilfe">Hilfe</a></li>';
    if ($logedin) {
        echo '<li><a href="index.php?l=nachrichten">Nachrichten</a></li>';
    }
}
elseif ($_GET['l'] == "anfragen"){
    echo '<li><a href="index.php?l=home">Home</a></li>';
    echo '<li class="sie-sind-hier"><a href="index.php?l=anfragen">Anfragen</a></li>';
    echo '<li><a href="index.php?l=angebote">Angebote</a></li>';
    echo '<li><a href="index.php?l=meinkonto">Mein Konto</a></li>';
    echo '<li><a href="index.php?l=hilfe">Hilfe</a></li>';
    if ($logedin) {
        echo '<li><a href="index.php?l=nachrichten">Nachrichten</a></li>';
    }
}
elseif ($_GET['l'] == "angebote"){
    echo '<li><a href="index.php?l=home">Home</a></li>';
    echo '<li><a href="index.php?l=anfragen">Anfragen</a></li>';
    echo '<li class="sie-sind-hier"><a href="index.php?l=angebote">Angebote</a></li>';
    echo '<li><a href="index.php?l=meinkonto">Mein Konto</a></li>';
    echo '<li><a href="index.php?l=hilfe">Hilfe</a></li>';
    if ($logedin) {
        echo '<li><a href="index.php?l=nachrichten">Nachrichten</a></li>';
    }
}
elseif ($_GET['l'] == "meinkonto"){
    echo '<li><a href="index.php?l=home">Home</a></li>';
    echo '<li><a href="index.php?l=anfragen">Anfragen</a></li>';
    echo '<li><a href="index.php?l=angebote">Angebote</a></li>';
    echo '<li class="sie-sind-hier"><a href="index.php?l=meinkonto">Mein Konto</a></li>';
    echo '<li><a href="index.php?l=hilfe">Hilfe</a></li>';
    if ($logedin) {
        echo '<li><a href="index.php?l=nachrichten">Nachrichten</a></li>';
    }
}
elseif ($_GET['l'] == "hilfe"){
    echo '<li><a href="index.php?l=home">Home</a></li>';
    echo '<li><a href="index.php?l=anfragen">Anfragen</a></li>';
    echo '<li><a href="index.php?l=angebote">Angebote</a></li>';
    echo '<li><a href="index.php?l=meinkonto">Mein Konto</a></li>';
    echo '<li class="sie-sind-hier"><a href="index.php?l=hilfe">Hilfe</a></li>';
    if ($logedin) {
        echo '<li><a href="index.php?l=nachrichten">Nachrichten</a></li>';
    }
}
elseif ($_GET['l'] == "nachrichten"){
    echo '<li><a href="index.php?l=home">Home</a></li>';
    echo '<li><a href="index.php?l=anfragen">Anfragen</a></li>';
    echo '<li><a href="index.php?l=angebote">Angebote</a></li>';
    echo '<li><a href="index.php?l=meinkonto">Mein Konto</a></li>';
    echo '<li><a href="index.php?l=hilfe">Hilfe</a></li>';
    if ($logedin) {
        echo '<li class="sie-sind-hier"><a href="index.php?l=nachrichten">Nachrichten</a></li>';
    }
}
elseif ($_GET['l'] == 'such'){
    echo '<li><a href="index.php?l=home">Home</a></li>';
    echo '<li><a href="index.php?l=anfragen">Anfragen</a></li>';
    echo '<li><a href="index.php?l=angebote">Angebote</a></li>';
    echo '<li><a href="index.php?l=meinkonto">Mein Konto</a></li>';
    echo '<li><a href="index.php?l=hilfe">Hilfe</a></li>';
    if ($logedin) {
        echo '<li><a href="index.php?l=nachrichten">Nachrichten</a></li>';
    }
    echo '<li class="sie-sind-hier"><a href="#">Suche</a></li>';
}
else {
    echo '<li><a href="index.php?l=home">Home</a></li>';
    echo '<li><a href="index.php?l=anfragen">Anfragen</a></li>';
    echo '<li><a href="index.php?l=angebote">Angebote</a></li>';
    echo '<li><a href="index.php?l=meinkonto">Mein Konto</a></li>';
    echo '<li><a href="index.php?l=hilfe">Hilfe</a></li>';
    if ($logedin) {
        echo '<li><a href="index.php?l=nachrichten">Nachrichten</a></li>';
    }
}
?>
