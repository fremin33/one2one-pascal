<!-- CARTE UNIQUE -->
<h1>FIT GROUP & CROSS TRAINING</h1>
	
	<table class="listeClients">
	<tr>
		<th>Numéro de Carte</th><th>Nom</th><th>Prénom</th><th>Nombre de séance restante</th><th>date d'expiration</th><th>Modifications</th><th>Supprimer</th>
	</tr>

<?php
	
foreach ($listeClientCarte as $key => $value) {
	echo "<tr><td>".$value['numCarte']."</td><td>".$value['nom']."</td><td>".$value['prenom']."</td><td>".$value['nbSeancesRestantes']."</td><td>".date('d-m-Y',strtotime($value['date']))."</td><td><a href=\"modifierClient.php?num=".$value['id']."\"><img src=\"images/modifier-icone.png\" alt=\"icone modifier\" > </a></td></tr>";
	
	
	
}
?>
	
</table>






<h1>Clients FIT GROUP</h1>

<table class="listeClients">
	<tr>
		<th>Numéro de Carte</th><th>Nom</th><th>Prénom</th><th>Nombre de séance restante</th><th>date d'expiration</th><th>Modifications</th><th>Supprimer</th>
	</tr>

<?php
	
foreach ($listeClientFitGroup as $key => $value) {
	echo "<tr><td>".$value['numCarte']."</td><td>".$value['nom']."</td><td>".$value['prenom']."</td><td>".$value['nbSeancesRestantes']."</td><td>".date('d-m-Y',strtotime($value['date']))."</td><td><a href=\"modifierClient.php?num=".$value['id']."\"><img src=\"images/modifier-icone.png\" alt=\"icone modifier\" > </a></td>
	
	
	<td> <a href=\"#\" onclick=\"supprimerUnClient();\"><img id=\"supprimerClient\" src=\"images/supprimer.png\" alt=\"icone supprime\" ></a></td>
	
	</tr>";
}
?>
</table>


<script>

//suppression d'un client

function supprimerUnClient(){
	if(confirm('Etes vous sûr de vouloir supremier ce client ainsi que toutes ces réservations ?'))
	{
		
		//requete de suppression
		alert('suppresion');
		
		//requete de suppression du client
		////////////////////////////////
		$.get("calendrier/modificationTableau/controller.php", 
				{  week:'pre',date:date  },
				function(data){
					$('#calendrier table').remove();					
					$('#calendrier').append(data);
				} );
		
		
		//requete de suppresion de ces reservations
		
		
		
		
		
	
	
	}

	

}


</script>




<h1>Clients FIT ONE</h1>


<table class="listeClients">
	<tr>
		<th>Numéro de Carte</th><th>Nom</th><th>Prénom</th><th>Nombre de séance restante</th><th>date d'expiration</th><th>Modifications</th><th>Supprimer</th>
	</tr>

<?php

//echo date('d-m-Y',strtotime('+4 month',strtotime(date("Y-m-d"))));


foreach ($listeClientFitOne as $key => $value) {
	echo "<tr><td>".$value['numCarte']."</td><td>".$value['nom']."</td><td>".$value['prenom']."</td><td>".$value['nbSeancesRestantes']."</td><td>".date('d-m-Y',strtotime($value['date']))."</td><td><a href=\"modifierClient.php?num=".$value['id']."\"><img src=\"images/modifier-icone.png\" alt=\"icone modifier\" > </a></td> 
	
	
	
	</tr>";
	
	
	
}
?>

</table>


<h1>Clients FIT ONE DUO</h1>
<table class="listeClients">
	<tr>
		<th>Numéro de Carte</th><th>Nom</th><th>Prénom</th><th>Nombre de séance restante</th><th>date d'expiration</th><th>Modifications</th><th>Supprimer</th>
	</tr>

<?php
	
foreach ($listeClientFitOneDuo as $key => $value) {
	echo "<tr><td>".$value['numCarte']."</td><td>".$value['nom']."</td><td>".$value['prenom']."</td><td>".$value['nbSeancesRestantes']."</td><td>".date('d-m-Y',strtotime($value['date']))."</td><td><a href=\"modifierClient.php?num=".$value['id']."\"><img src=\"images/modifier-icone.png\" alt=\"icone modifier\" > </a></td></tr>";
	
	
	
}
?>
</table>
	
	
<h1>Clients FIT ONE TRIO</h1> 

<table class="listeClients">
	<tr>
		<th>Numéro de Carte</th><th>Nom</th><th>Prénom</th><th>Nombre de séance restante</th><th>date d'expiration</th><th>Modifications</th><th>Supprimer</th>
	</tr>

<?php
	
foreach ($listeClientFitOneTrio as $key => $value) {
	echo "<tr><td>".$value['numCarte']."</td><td>".$value['nom']."</td><td>".$value['prenom']."</td><td>".$value['nbSeancesRestantes']."</td><td>".date('d-m-Y',strtotime($value['date']))."</td><td><a href=\"modifierClient.php?num=".$value['id']."\"><img src=\"images/modifier-icone.png\" alt=\"icone modifier\" > </a></td></tr>";
	
	
	
}
?>
</table>


<!-- CROSS TRAINING -->
<h1>Clients CROSS TRAINING</h1>
	
	<table class="listeClients">
	<tr>
		<th>Numéro de Carte</th><th>Nom</th><th>Prénom</th><th>Nombre de séance restante</th><th>date d'expiration</th><th>Modifications</th><th>Supprimer</th>
	</tr>

<?php
	
foreach ($listeClientCrossTraining as $key => $value) {
	echo "<tr><td>".$value['numCarte']."</td><td>".$value['nom']."</td><td>".$value['prenom']."</td><td>".$value['nbSeancesRestantes']."</td><td>".date('d-m-Y',strtotime($value['date']))."</td><td><a href=\"modifierClient.php?num=".$value['id']."\"><img src=\"images/modifier-icone.png\" alt=\"icone modifier\" > </a></td></tr>";
	
	
	
}
?>
	
</table>





<!-- FIT TEAM -->
<h1>Clients FIT TEAM</h1>
	
	<table class="listeClients">
	<tr>
		<th>Numéro de Carte</th><th>Nom</th><th>Prénom</th><th>Nombre de séance restante</th><th>date d'expiration</th><th>Modifications</th><th>Supprimer</th>
	</tr>

<?php
	
foreach ($listeClientFitTeam as $key => $value) {
	echo "<tr><td>".$value['numCarte']."</td><td>".$value['nom']."</td><td>".$value['prenom']."</td><td>".$value['nbSeancesRestantes']."</td><td>".date('d-m-Y',strtotime($value['date']))."</td><td><a href=\"modifierClient.php?num=".$value['id']."\"><img src=\"images/modifier-icone.png\" alt=\"icone modifier\" > </a></td></tr>";
	
	
	
}
?>
	
</table>














<h1>Clients sans abonnements</h1>

	<table class="listeClients">
	<tr>
		<th>Numéro de Carte</th><th>Nom</th><th>Prénom</th><th>id a supprimer</th><th>date d'expiration</th><th>Modifications</th><th>Supprimer</th>
	</tr>
<?php

foreach ($sans as $key => $value) {
	echo "<tr><td>".$value['numCarte']."</td><td>".$value['nom']."</td><td>".$value['prenom']."</td><td>".$value['id']."</td><td></td><td><a href=\"modifierClient.php?num=".$value['id']."\"><img src=\"images/modifier-icone.png\" alt=\"icone modifier\" > </a></td></tr>";
	
	
	
}



?>







</table>

<br />
<br />







 























</div>