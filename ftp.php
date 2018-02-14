<?php
echo "tet";
$ftp_server="ftp.one2one-larochelle.com";
$ftp_user_name="oneonela";
$ftp_user_pass="mNYNgwKm";


echo getcwd();



// Définition de quelques variables
$local_file = 'C:\Users\abourmau\Desktop\testFTP\bg.jpg';
$server_file ='bg.jpg';

// Mise en place d'une connexion basique
$conn_id = ftp_connect($ftp_server);

// Identification avec un nom d'utilisateur et un mot de passe
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// switch to passive mode (mandatory on Ovh shared hosting)
ftp_pasv( $conn_id, true );

// Tentative de téléchargement du fichier $server_file et sauvegarde dans le fichier $local_file
if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
    echo "Le fichier $local_file a été écris avec succès\n";
} else {
    echo "Il y a un problème\n";
}

// Fermeture de la connexion
ftp_close($conn_id);


function saveImage($urlImage, $title){

    $fullpath = $title;
    $ch = curl_init ($urlImage);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $rawdata=curl_exec($ch);
    curl_close ($ch);
    if(file_exists($fullpath)){
        unlink($fullpath);
    }
    $fp = fopen($fullpath,'x');
    $r = fwrite($fp, $rawdata);

    setMemoryLimit($fullpath);

    fclose($fp);

    return $r;
}


function setMemoryLimit($filename){
   set_time_limit(50);
   $maxMemoryUsage = 258;
   $width  = 0;
   $height = 0;
   $size   = ini_get('memory_limit');

   list($width, $height) = getimagesize($filename);
   $size = $size + floor(($width * $height * 4 * 1.5 + 1048576) / 1048576);

   if ($size > $maxMemoryUsage) $size = $maxMemoryUsage;

   ini_set('memory_limit',$size.'M');

}

//saveImage("http://one2one-larochelle.com/images/fond/8.jpg","test.jpg");


?>