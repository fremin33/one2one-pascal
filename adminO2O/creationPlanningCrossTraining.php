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
    
    <link rel="StyleSheet" href="css/calendrier.css" media="screen"/>
    
     <script type="text/javascript" src="js/jquery-1.7.1.min.js" ></script>
    <script type="text/javascript" src="js/comportement.js" ></script>
 
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
     <?php include('contenus/creerPlanningCrossTraining/controller.php'); // Inclure la page ?>
    </article> 
    
   
     
   </div> <!-- Fin du corps -->
  <footer>
   <!-- Design inspiré par <a href="http://www.styleshout.com">StyleShout</a>-->
  </footer> 
</div> <!-- Fin du container -->
</div>


		<script src="js/jquery-1.7.1.min.js"></script> 
<script src="bootstrap/js/bootstrap.min.js "></script>
	<script type="text/javascript" src="http://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>

<script type="text/javascript" src="calendrierCrossTraining/calendrierCross.js"></script>


</body>

</html>
