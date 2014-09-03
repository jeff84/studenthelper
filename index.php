<!DOCTYPE html>
<?php require('class/class.database.php');
    require('auth/pass-md5.php');
    require('auth/db.php');
    require('auth/csrf-token.php'); ?>
<!-- SWA Projekt - Gruppe 3 (Hiller, Miller, Welzel) -->

<html lang="de">
  
  <head>
    <?php require("auth/auth.php") ?>
    <title>student-helper.de</title>
    <meta charset="utf-8"> 
    <link href="style.css" rel="stylesheet">
	<link rel="shortcut icon" href="favicon.png" type="image/png">
	<link rel="icon" href="favicon.png" type="image/png">
	<meta name="dcterms.Title" content="student-helper.de" />
	<meta name="dcterms.Creator" content="Hiller, Miller, Welzel" />
	<meta name="dcterms.Subject" content="Student, Nachhilfe" />
	<meta name="dcterms.Description" content="Suchen und Anbieten von Nachhilfe für Studenten" />
	<meta name="dcterms.Publisher" content="Hiller, Miller, Welzel" />
	<meta name="dcterms.Date" content="2012-02-06" />
	<meta name="dcterms.Format" content="text/html" />
	<meta name="dcterms.Language" content="de-DE" />
  </head>

  <body>
    <div id="wrapper">
      <div id="header">
	    <h1 class="contentleft"><a href="index.php"><img src="logo.svg" id="logo" alt="student-helper.de" width="222" height="80"></h1>
		<div id="schriftzug2" class=""><p>student-helper.de</p></div>
		<div id="schriftzug" class=""><p>student-helper.de</p></a></div>
		<?php require("loginbox.php") ?>
	  </div>
	  <div id="nav" class="clearfloats">
	    <ul>
		  <?php require("nav.php") ?>
		</ul>
	  </div>
	  <div id="content">
        <?php require("contentswitch.php") ?>
	  </div>
	  <div id="footer" class="clearfloats">
	    <ul>
		<?php require("footnav.php") ?>
		</ul>
	  </div>
	</div>
  </body>
</html>
