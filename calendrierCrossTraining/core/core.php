<?php
function connexionBd(){
    $PARAM_hote = 'localhost'; // le chemin vers le serveur
    $PARAM_nom_bd = 'one2one'; // le nom de votre base de données
    $PARAM_utilisateur = 'root'; // nom d'utilisateur pour se connecter
    $PARAM_mdp = 'root'; // mot de passe de l'utilisateur pour se connecter

$papa="moi";

try
{
        
        $connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mdp);
        //var_dump($connexion);
}
catch(Exception $e)
{
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
}


return $connexion;
}
	
	require 'model.php';

?>