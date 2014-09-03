<?php
if (isset($_GET['l'])){
    if ($_GET['l'] == "about"){
        echo '<li class="sie-sind-foot"><a href="index.php?l=about">Über Uns</a></li>
            <li><a href="index.php?l=impressum">Impressum</a></li>
            <li><a href="index.php?l=agb">AGB</a></li>
            <li><a href="index.php?l=kontakt">Kontakt</a></li>';
    }
    elseif ($_GET['l'] == "impressum"){
        echo '<li><a href="index.php?l=about">Über Uns</a></li>
            <li class="sie-sind-foot"><a href="index.php?l=impressum">Impressum</a></li>
            <li><a href="index.php?l=agb">AGB</a></li>
            <li><a href="index.php?l=kontakt">Kontakt</a></li>';
    }
    elseif ($_GET['l'] == "agb"){
        echo '<li><a href="index.php?l=about">Über Uns</a></li>
            <li><a href="index.php?l=impressum">Impressum</a></li>
            <li class="sie-sind-foot"><a href="index.php?l=agb">AGB</a></li>
            <li><a href="index.php?l=kontakt">Kontakt</a></li>';
    }
    elseif ($_GET['l'] == "kontakt"){
        echo '<li><a href="index.php?l=about">Über Uns</a></li>
            <li><a href="index.php?l=impressum">Impressum</a></li>
            <li><a href="index.php?l=agb">AGB</a></li>
            <li class="sie-sind-foot"><a href="index.php?l=kontakt">Kontakt</a></li>';
    }
    else {
        echo '<li><a href="index.php?l=about">Über Uns</a></li>
            <li><a href="index.php?l=impressum">Impressum</a></li>
            <li><a href="index.php?l=agb">AGB</a></li>
            <li><a href="index.php?l=kontakt">Kontakt</a></li>';
    }
}
else {
    echo '<li><a href="index.php?l=about">Über Uns</a></li>
        <li><a href="index.php?l=impressum">Impressum</a></li>
        <li><a href="index.php?l=agb">AGB</a></li>
        <li><a href="index.php?l=kontakt">Kontakt</a></li>';
}
?>
