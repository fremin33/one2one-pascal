<?php

function envoyerUnMail($destinataire,$message, $fichierJoint=null)
{

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

li{
	margin-left:30px;
}

.petit{
	font-size:11px;
	font-style:italic;
	margin-top:15px;
}

a{
	color : #E31F67;
	text-decoration:underline;
}

#gauche{
	float:left;
	margin-right:20px;
}
</style>

</head>

<body><table>
<p id=\"gauche\"><img src=\"cid:image1\"></p>";

$msg.=$message;

	

$msg.="</body></html>\r\n";
$msg .= "\r\n";








//---------------------------------
// 2nde partie du message
// Le 1er fichier (inline)
//---------------------------------
$fichier = "logo.png";
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

//--------------------------------
//Envoi d'une piece jointe
//--------------------------------
if (file_existS($fichierJoint))
{
	////=====Ajout de la pièce jointe.
//$message.= "Content-Type: image/jpeg; name=\"image.jpg\"".$passage_ligne;
//$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
	
	
$fp2     = fopen($fichierJoint, "rb");
$fichierattache2 = fread($fp2, filesize($fichierJoint));
fclose($fp2);
$fichierattache2 = chunk_split(base64_encode($fichierattache2));

$msg .= "--$delimiteur\r\n";
$msg .= "Content-Type: image/jpeg; name=\"$fichierJoint\"\r\n";
$msg .= "Content-Transfer-Encoding: base64\r\n";
$msg .= "Content-ID: <image1>\r\n";
$msg .= "\r\n";
$msg .= $fichierattache2 . "\r\n";
$msg .= "\r\n\r\n";





}





//------------------------
// Envoi du Mail
//------------------------


$expediteur   = "one2one.larochelle@gmail.com";
$reponse      = $expediteur;
//echo "Ce script envoie un mail avec une image ";
mail($destinataire,
     "One 2 One",
     $msg,
     "Reply-to: $reponse\r\nFrom: $expediteur\r\n".$entete);
}



?>