<?php
	function generatePassword($length = 8) {
    $chars = '0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}
?>


<h1>Inscription Client</h1>		
			
	<form action="enregistrementClients.php" method="post">
	<fieldset id="infoClient">
     		
		<p><label for="nom">Nom</label>
		<input type="text" name="nom" id="nom" placeholder="Nom" required></p>
		
		<p><label for="prenom">Prénom</label>
		<input type="text" name="prenom" id="prenom" placeholder="Prénom" required></p>
		
		<p><label for="numCarte">Numéro carte</label>
		<input type="text" name="numCarte" id="numCarte"  value="<?php echo generatePassword();?>">  </p>
		
		<p><label for="adresse">Adresse</label>
		<textarea name="adresse" id="adresse" > </textarea></p>
	
		<p><label for="tel">Téléphone</label>
		<input type="tel" id="tel" name="tel" placeholder="Téléphone" required></p>
		
		<p><label for="email">Champ Email</label>
		<input type="email" id="email" name="email" placeholder="votre@dresse.fr" required></p>
	
		
	</fieldset>	
	

	
	<fieldset id="formules">
     	
		<!-- FIT ONE -->
		
		<table>
			<tr><th class="formu">Formules</th><th class="inputCheck"></th><th class="nb">nombre séances</th><th class="date">date inscription</th></tr>
			
			<tr id="fitOne">
				<td><label for="formuleFitOne">Formule FIT ONE - SOLO </label></td>
				<td> 	<input type="checkbox" name="formuleFitOne" value="1"></td>
				<td><input type="text" name="nbSeanceOne" id="nbSeance"  value="10">  </td>
				<td><input type="date" name="dateFitOne" id="dateFitOne" value="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"  placeholder="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"></td>
			</tr>
			
			<tr id="fitDuo">
				<td><label for="formuleFitDuo">Formule FIT ONE - DUO </label> </td>
				<td>	<input type="checkbox" name="formuleFitDuo" value="2"></td>
				<td><input type="text" name="nbSeanceDuo" id="nbSeance"  value="10">  </td>
				<td><input type="date" name="dateFitDuo" id="dateFitOne" value="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"  placeholder="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"></td>
			</tr>
			
			<tr id="fitTrio">
				<td><label for="formuleFitTrio">Formule FIT ONE - TRIO </label></td>
				<td><input type="checkbox" name="formuleFitTrio" value="3"></td>
				<td><input type="text" name="nbSeanceTrio" id="nbSeanceTrio"  value="10">  </td>
				<td><input type="date" name="dateFitTrio" id="dateFitTrio" value="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"  placeholder="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"></td>
			</tr>
			
			<!--<tr id="fitGroup">
				<td><label for="formuleFitGroup">Formule FIT GROUP </label> </td>
				<td>	<input type="checkbox" name="formuleFitGroup" value="5"></td>
				<td><input type="text" name="nbSeanceGroup" id="nbSeance"  value="10">  </td>
				<td><input type="date" name="dateFitGroup" id="dateFitGroup" value="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"  placeholder="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"></td>
			</tr>-->
			
			
			<!-- Carte UNIQUE -->
			<tr id="fitGroup">
				<td><label for="formuleFitCarte">formule FIT GROUP/CROSS TRAINING </label> </td>
				<td>	<input type="checkbox" name="formuleFitCarte" value="10"></td>
				<td><input type="text" name="nbSeanceCarte" id="nbSeanceCarte"  value="10">  </td>
				<td><input type="date" name="dateFitCarte" id="dateFitCarte" value="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"  placeholder="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"></td>
			</tr>
			
			
			
			<tr id="fitTeam">
				<td><label for="formuleFitTeam">Formule FIT TEAM </label></td>
				<td> 	<input type="checkbox" name="formuleFitTeam" value="7"></td>
				<td><input type="text" name="nbSeanceTeam" id="nbSeance"  value="10">  </td>
				<td><input type="date" name="dateFitTeam" id="dateFitTeam" value="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"  placeholder="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"></td>
			</tr>
            
            <!--
            <tr id="crossTraining">
				<td><label for="formuleCrossTraining">CROSS TRAINING </label></td>
				<td> 	<input type="checkbox" name="formuleCrossTraining" value="9"></td>
				<td><input type="text" name="nbSeanceCrossTraining" id="nbSeance"  value="10">  </td>
				<td><input type="date" name="dateCrossTraining" id="dateCrossTraining" value="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"  placeholder="<?php echo date('Y-m-d',strtotime('+4 month',strtotime(date('Y-m-d')))); ?>"></td>
			</tr>
			
			-->
			
		</table>
		
	
	</fieldset>
	
	
	
     		
			
		<p class="centerAlign"><input type="submit" class="boutonSubmit"  value="Enregistrement" /> </p>
		
	
	</form>