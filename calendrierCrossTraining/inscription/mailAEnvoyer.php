<?php
	include('envoiMail.php');
	
	$destinataire=$_POST["dest"];
	$message=stripslashes ($_POST["message"]);
	
	envoyerUnMail($destinataire,$message)


?>