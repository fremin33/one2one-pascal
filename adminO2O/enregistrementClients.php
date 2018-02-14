<?php
	require("core/core.php");

?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" media="screen" />

   <link rel="StyleSheet" href="css/styleFormulaire.css" media="screen"/>
   <link rel="StyleSheet" href="css/style.css" media="screen"/> 
    
  <!--<link rel="StyleSheet" href="habillage/layout.css" media="screen"/>
  <link rel="StyleSheet" href="habillage/couleurs.css" media="screen"/>
  <link rel="StyleSheet" href="habillage/formulaires.css" media="screen"/>
  <link rel="StyleSheet" href="habillage/autres.css" media="screen"/> --> 
  <title>Gestion One 2 One</title>
</head>

<body> 
<div class="wrapper">
	<div class="container">
    <nav class="navbar navbar-fixed-top">
       <?php include('menu.html') ?>  
       </nav>
    <!-- Fin du menu -->
  <div id="corps">
     <article>
     <?php include('contenus/enregistrerClients/controller.php'); // Inclure la page ?>
    </article> 
    
   
     
   </div> <!-- Fin du corps -->
  <footer>
   <!-- Design inspiré par <a href="http://www.styleshout.com">StyleShout</a>-->
  </footer> 
</div> <!-- Fin du container -->
</div>
</body>

</html>
