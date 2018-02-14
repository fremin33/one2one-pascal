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
    




  <script src="js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({
      selector:'textarea', 
      plugins: "textcolor",
      menubar : false,

      toolbar: "forecolor | undo redo | styleselect | bold italic | fontsizeselect"});</script>


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
     <?php include('contenus/mailAEnvoyer/controller.php'); // Inclure la page ?>
    </article> 
    
   
     
   </div> <!-- Fin du corps -->
  <footer>
   <!-- Design inspiré par <a href="http://www.styleshout.com">StyleShout</a>-->
  </footer> 
</div> <!-- Fin du container -->
</div>
</body>

</html>
