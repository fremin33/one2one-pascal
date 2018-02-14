<?php
	//$link = mysql_connect("mysql51-56.pro","oneonelagest","z4v7fPA5") 
		$link = mysql_connect("localhost","root","")
		or die("Echec de la connexion : " . mysql_error() );	
	//echo '<p><em>Connexion r&eacute;ussie</em></p>';
	
	// on selectionne notre base : oneonelagest ou gestiono2o
	mysql_select_db("gestiono2o", $link) or die("Echec de la selection : " . mysql_error() );
	//echo '<p><em>La BD &agrave; &eacute;t&eacute; correctement s&eacute;lectionn&eacute;e</em></p>';
	
	// On force l'encodge en utf8
	mysql_set_charset("utf8", $link);
	
	
	require 'model.php';

?>