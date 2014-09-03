<div id="suchcontainer">
    <div id="suchauswahl">
        <ul>
        <?php
            if (!isset($_GET['s']) OR ($_GET['s'] == "anfragen")){
                echo '<li class="sie-sind-hier"><a href="index.php?s=anfragen">Anfragen</a></li>';
                echo '<li><a href="index.php?s=angebote">Angebote</a></li>';
            }
            elseif ($_GET['s'] == "angebote"){
                echo '<li><a href="index.php?s=anfragen">Anfragen</a></li>';
	            echo '<li class="sie-sind-hier"><a href="index.php?s=angebote">Angebote</a></li>';
            }
        ?>
        </ul>
    </div>
<?php require('content/suche.php'); ?>
</div>
<div id="anzeigen" class="right">
    <h1>Aktuelle Angebote und Suchanfragen</h1>
    <p><?php require('content/aktuell.php'); ?></p>
</div>
<div id="sonstiges" class="clearleft">
    <p><?php 
        echo '<a href="http://search.twitter.com/search?q=%23uni" target="_blank"><h3>#uni Tweets:</h3></a>';
        /* $feed = 'http://search.twitter.com/search.json?q=%23uni&rpp=5&include_entities=true&result_type=recent';
        $tweets = file_get_contents($feed);
        $tweet = explode("{", $tweets);
        print_r($tweet); */
        require('class/class.twitter.php');
        $twitter = new twitter_class();
        $tweets = $twitter->getTweets('#uni', 5);
        echo $tweets;
       ?></p>
</div>
