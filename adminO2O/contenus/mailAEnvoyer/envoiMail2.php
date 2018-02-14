<?php


function envoyerUnMail($destinataire,$sujet,$message, $fichierJoint,$type)
{
	$mail = $destinataire;
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
/*$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";*/
//==========

/*
$message_html="<html><head>

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
	margin-top:25px;
}

a{
	color : #E31F67;
	text-decoration:underline;
}

#gauche{
	float:left;
	margin-right:20px;
	margin-top : 30px;
}
</style>

</head>

<body><table>
<p id=\"gauche\"><img src=\"http://one2one-larochelle.com/images/logo.png\"></p>";

$message_html.=$message;

//http://one2one-larochelle.com/images/logo.png
	

$message_html.="</body></html>\r\n";
$message_html.= $passage_ligne;
*/


//=====Lecture de l'image du logo.
$logo = "logo.png";
$fp = fopen($logo, "r");
$logoattache = fread($fp, filesize($logo));
$logoattache = chunk_split(base64_encode($logoattache));
fclose($fp);
//==========







 if($fichierJoint!=null)
 {
//=====Lecture et mise en forme de la pièce jointe.
$fichier   = fopen("contenus/mailAEnvoyer/fichiers/".$fichierJoint, "r");
$attachement = fread($fichier, filesize("contenus/mailAEnvoyer/fichiers/".$fichierJoint));
$attachement = chunk_split(base64_encode($attachement));
fclose($fichier);
//==========
}

/*
 if($fichierJointPDF!=null)
{
//=====Lecture et mise en forme de la pièce jointe.
$fichierPDF   = fopen($fichierJointPDF, "r");
$attachementPDF = fread($fichierPDF, filesize($fichierJointPDF));
$attachementPDF = chunk_split(base64_encode($attachementPDF));
fclose($fichierPDF);
//==========
}

*/


$message_html=$message."\r\n";
$message_html.= $passage_ligne;;

 
//=====Création de la boundary.
$boundary = "-----=".md5(rand());
$boundary_alt = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "One 2 One : ".$sujet;
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"one2one.larochelle@gmail.com\"<one2one.larochelle@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"One2One\" <one2one.larochelle@gmail.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
//=====Ajout du message au format texte.
/*$message.= "Content-Type: text/plain; charset=\"utf-8\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
 
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;*/
 
//=====Ajout du message au format HTML.
$message.= "Content-Type: text/html; charset=\"utf-8\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
 
//=====On ferme la boundary alternative.
$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
//==========
 
 
if($fichierJoint!=null)
{
$message.= $passage_ligne."--".$boundary.$passage_ligne ;
 
//=====Ajout de la pièce jointe jpg.
$message.= "Content-Type:".$type."; name=\"".$fichierJoint."\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
$message.= "Content-Disposition: attachment; filename=\"".$fichierJoint."\"".$passage_ligne;
$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
//========== 
}
/*
if($fichierJointPDF!=null)
{
$message.= $passage_ligne."--".$boundary.$passage_ligne ;
 
//=====Ajout de la pièce jointe pdf.
$message.= "Content-Type: image/jpeg; name=\"".$fichierJointPDF."\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
$message.= "Content-Disposition: attachment; filename=\"".$fichierJointPDF."\"".$passage_ligne;
$message.= $passage_ligne.$attachementPDF.$passage_ligne.$passage_ligne;

}
//$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
//========== 

 */
$message.= $passage_ligne."--".$boundary.$passage_ligne ;
 
//=====Ajout du logo.
$message.= "Content-Type: application/octet-stream; name=\"$logo\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
$message.= "Content-ID: <image1>".$passage_ligne;
$message.= $passage_ligne.$logoattache.$passage_ligne.$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
//========== 









//=====Envoi de l'e-mail.
return mail($mail,$sujet,$message,$header);
 
//==========












}