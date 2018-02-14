<?php

echo "<p>Un mail de confirmation lui a été transmis</p>";

//----------------------------------
// Construction de l'entête
//----------------------------------
$delimiteur = "-----=".md5(uniqid(rand()));

$entete = "MIME-Version: 1.0\r\n";
$entete .= "Content-Type: multipart/related; boundary=\"$delimiteur\"\r\n";
$entete .= "\r\n";

//--------------------------------------------------
// Construction du message proprement dit
//--------------------------------------------------

$msg = "Je vous informe que ceci est un message au format MIME 1.0 multipart/mixed.\r\n";


//--------------------------------------------------
// contenu message
//--------------------------------------------------

$contenu=$rep;
/*if (!empty($texteFitOne)) $contenu.="<li>".$texteFitOne."</li>";

if (!empty($texteFitDuo)) $contenu.="<li>".$texteFitDuo."</li>";

if (!empty($texteFitTrio)) $contenu.="<li>".$texteFitTrio."</li>";

if (!empty($texteFitGroup)) $contenu.="<li>".$texteFitGroup."</li>";

if (!empty($texteFitTeam)) $contenu.="<li>".$texteFitTeam."</li>";*/





//---------------------------------
// 1ère partie du message
// Le code HTML
//---------------------------------
$msg .= "--$delimiteur\r\n";
$msg .= "Content-Type: text/html; charset=\"utf-8\"\r\n";
$msg .= "Content-Transfer-Encoding:8bit\r\n";
$msg .= "\r\n";
$msg .= "<html><head>






<style type=\"text/css\">
body
{
   background-color:black;
   color: white;
}

.rose{
	color : #E31F67;
}
#gauche{
	float:left;
	margin-right:20px;
}
</style>

</head>

<body><table>
<p id=\"gauche\"><img src=\"cid:image1\"></p>

	<p>Bonjour ".$_POST['prenom']."</p>
	<p>Vous avez souscrit à </p><ul>".$contenu."</ul>
	<p>Pour vous inscrire aux cours de FIT GROUP ou de CROSS TRAINING, vous devez vous connecter au site Internet dans le calendrier du FIT GROUP ou celui du CROSS TRAINING et réserver votre cours en utilisant le numéro de  votre carte d'adhérent : <span class=\"rose\">".$_POST['numCarte']."
	</span><p>Merci de la confiance que vous nous accordez,</p>
	<p>Au plaisir de vous voir pour votre prochaine séance,</p>
	<p>Sportivement,</p>
	<p>Vos coach : Alexandre Bares et Pascal Mas </p>

</body></html>\r\n";
$msg .= "\r\n";








//---------------------------------
// 2nde partie du message
// Le 1er fichier (inline)
//---------------------------------
$fichier = "images/logo.png";
$fp      = fopen($fichier, "rb");
$fichierattache = fread($fp, filesize($fichier));
fclose($fp);
$fichierattache = chunk_split(base64_encode($fichierattache));

$msg .= "--$delimiteur\r\n";
$msg .= "Content-Type: application/octet-stream; name=\"$fichier\"\r\n";
$msg .= "Content-Transfer-Encoding: base64\r\n";
$msg .= "Content-ID: <image1>\r\n";
$msg .= "\r\n";
$msg .= $fichierattache . "\r\n";
$msg .= "\r\n\r\n";

//------------------------
// Envoi du Mail
//------------------------

$destinataire = $_POST['email'];
$expediteur   = "one2one.larochelle@gmail.com";
$reponse      = $expediteur;
//echo "Ce script envoie un mail avec une image ";
mail($destinataire,
     "One 2 One",
     $msg,
     "Reply-to: $reponse\r\nFrom: $expediteur\r\n".$entete);




?>