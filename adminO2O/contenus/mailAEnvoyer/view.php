
 <?php

     $sujet="";
     $content="";
     $fichier="";

/*
    if (isset($_POST["EnvoiPourTest"]))
    {
       
          // test du sujet
        if(isset($_POST["sujet"]) && !empty($_POST["sujet"])) $sujet=$_POST["sujet"];

         if(isset($_POST["content"]) && !empty($_POST["content"])) $content=stripcslashes($_POST["content"]);

         if(isset($_FILES)) $fichier=$_FILES["fichier"]["name"];

   }*/


 ?>

  	

		<h3>ENVOI DE MAIL</h3>
	
	
		
		<form action="#" enctype="multipart/form-data" method="post" >
             <p>Sujet du Mail => One 2 One :<input type="text" name="sujet" value="<?php echo $sujet; ?>"required/></p>
             
             <p>Piece Jointe <input type="file" name="fichier" /></p>

<?php
/*
    if($fichier=="")
    { 
        echo  '<p>Piece Jointe <input type="file" name="fichier" /></p>';
    }
    else
    {
         echo  '<p>Piece Jointe choisie <input type="text" name="fichier" value="'.$fichier.'" /></p>';
    }
*/
?>


             

              <p> A qui souhaitez vous l'envoyer : 

            <select name="aQui">
               <!-- <option value="choisir">Test de mail</option> -->
               <option value="all">Tous les clients</option>                
                <option value="group">Clients FIT GROUP</option>
                <option value="one">Clients FIT ONE</option>
                 <option value="test">test</option>
            
            </select>

<p> </p>
<p> </p>
			<textarea name="content" height="400"><?php if($content!="") echo $content;   ?></textarea>	

		  <p>	<input type="submit" value="Envoyer le mail" name="EnvoiPourTest" /></p>
		</form>



<?php

    include("envoiMail2.php");

    $fichier=null;
    $type=null;

	if(isset($_POST["EnvoiPourTest"]))
	{
        // test du sujet
        if(isset($_POST["sujet"]) && !empty($_POST["sujet"])) $sujet=$_POST["sujet"];

        //test de l'ajout de fichier
        if(isset($_FILES) && !empty($_FILES))
        {

            if(!file_exists("contenus/mailAEnvoyer/fichiers/".$_FILES["fichier"]["name"]))
            {        
                move_uploaded_file($_FILES["fichier"]["tmp_name"], "contenus/mailAEnvoyer/fichiers/".$_FILES["fichier"]["name"]);

                $fichier=$_FILES["fichier"]["name"];
                $type=$_FILES["fichier"]["type"];

                echo "<p>fichier copié";

                echo "<p>".$_FILES["fichier"]["type"]."</p>";

               
            }
            else
            {
                if($_FILES["fichier"]["name"]!=null) echo "<p>Le fichier existe déjà</p>";
                 $fichier=$_FILES["fichier"]["name"];
                $type=$_FILES["fichier"]["type"];
            }


        }


         //Selon le choix on initiale la variable $client
        $val=$_POST["aQui"];

        $client=array();
      //  if($val=="choisir") { $client[]["email"]="abourmau@gmail.com@univ-lr.fr"; $client[]["email"]="abourmau@gmail.com"; }
        

            if($val=="one") $client=$clientOne;
         if($val=="group") $client=$clientGroup;
        if($val=="all") $client=$clientAll;
         if($val=="test") $client=$clientBourmaud;




        if(isset($_POST["content"]) && !empty($_POST["content"]))
        {












$message='<html><head>   
</head>
<body style="margin:0px; padding:0px; -webkit-text-size-adjust:none; color:#FFFFFF; background-color:#000000;" >

    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <tr>
                <td align="center">
                    <table  cellpadding="0" cellspacing="0" border="0">
                        <tbody>                            
                

                            <!-- entete -->
                            <tr class="pagetoplogo">
                                <td class="w640"  width="640">
                                    <table  class="w640"  width="640" cellpadding="0" cellspacing="0" border="0" >
                                        <tbody>
                                            <tr>
                                                <td class="w30"  width="30"></td>
                                                <td  class="w580"  width="580" valign="middle" align="left">
                                                    <div class="pagetoplogo-content">
                                                        <img class="w580" style="text-decoration: none; display: block; font-size:30px;" src="http://one2one-larochelle.com/images/logo.png" alt="Mon Logo" />
                                                    </div>
                                                </td> 
                                                <td class="w30"  width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <!-- separateur horizontal -->
                            <tr>
                                <td  class="w640"  width="640" height="1"></td>
                            </tr>

                             <!-- contenu -->
                            <tr class="content">
                                <td class="w640" class="w640"  width="640">
                                    <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td  class="w30"  width="30"></td>
                                                <td  class="w580"  width="580">
                                                    <!-- une zone de contenu -->
                                                    <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w580"  width="580">
                                                                    
                                                                    <div align="left" class="article-content">

';


$message.=stripcslashes($_POST["content"]);


                                                                   
$message.='                                                             </div>    </td>
                                                            </tr>
                                                          
                                                        </tbody>
                                                    </table>
                                                    <!-- fin zone -->                                                   

                                           

                                                  
                                                </td>
                                                <td class="w30" class="w30"  width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                           
                       
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>';


 echo "<p>".$sujet."</p>";
 echo "<p>".$content."</p>";
 echo "<p>".$fichier."</p>";


 //distribution des mails
    $nb=0;
    foreach ($client as $value) {
    
        envoyerUnMail($value["email"],$sujet,$message,$fichier,$type);
        

    	//echo "<p>".$value["email"]."</p>";

        $nb++;
    }

    echo "<p>Nombre de mail envoyés $nb </p>";





   }
	
}?>










		
	
	
		
	
	








	
	
	

 