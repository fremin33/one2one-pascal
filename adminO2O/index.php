<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  
   <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" media="screen" />

   <link rel="StyleSheet" href="css/styleFormulaire.css" media="screen"/>
   <link rel="StyleSheet" href="css/style.css" media="screen"/> 
    

  <title>Gestion One 2 One</title>
</head>

<body> 
<div class="wrapper">
	
    <div class="row-fluid">
    
    <nav class="navbar navbar-fixed-top">
       <?php include('menu.html') ?>  
       </nav>
    </div>
    <!-- Fin du menu -->
    <div class="container">
  <div id="corps">
     <article>
     <?php include('contenus/listerClients/controller.php'); // Inclure la page ?>
    </article> 
    
   
     
   </div> <!-- Fin du corps -->
  <footer>
   <!-- Design inspiré par <a href="http://www.styleshout.com">StyleShout</a>-->
  </footer> 
</div> <!-- Fin du container -->
</div>

<script type="text/javascript" src="js/comportement.js"></script>


</body>

</html>
