
<h1>MODIFICATION CLIENT </h1>		
			
	<form action="modifierMonClient.php" method="post">
	<fieldset>
     	
     
		<input type="hidden" name="id" id="id" value="<?php echo $leClient[0]['idClient']?>"></p>
     	
     		
		<p><label for="nom">Nom</label>
		<input type="text" name="nom" id="nom" placeholder="Nom" required value="<?php echo $leClient[0]['nom']?>"></p>
		
		<p><label for="prenom">Prénom</label>
		<input type="text" name="prenom" id="prenom" placeholder="Prénom" required value="<?php echo $leClient[0]['prenom']?>"></p>
		
		<p><label for="numCarte">Numéro carte</label>
		<input type="text" name="numCarte" id="numCarte"  value="<?php echo $leClient[0]['numCarte']?>">  </p>
		
		<p><label for="adresse">Adresse</label>
		<textarea name="adresse" id="adresse" ><?php echo $leClient[0]['adresse']?> </textarea></p>
	
		<p><label for="tel">Téléphone</label>
		<input type="tel" id="tel" name="tel" placeholder="Téléphone" required value="<?php echo $leClient[0]['tel']?>"></p>
		
		<p><label for="email">Champ Email</label>
		<input type="email" id="email" name="email" placeholder="votre@dresse.fr" required value="<?php echo $leClient[0]['email']?>"></p>
	
		
	</fieldset>	
	
	<fieldset id="formules">
     	
		<!-- FIT ONE -->
		
		<table>
			<tr><th class="formu">Formules</th><th class="inputCheck"></th><th class="nb">nombre séances</th><th class="date">date inscription</th></tr>
			
			<tr id="fitOne">
				
				<?php 
				
					
				
				
					if(isset($donneesClients['fitOne']) and $donneesClients['fitOne']==true)
					{
						echo "<input type=\"hidden\" name=\"idfitOne\" id=\"idfitOne\" value=\"".$donneesClients['idfitOne']."\">";
					}
				?>
				
				<td><label for="formuleFitOne">Formule FIT ONE - SOLO </label></td>
				<td> 	<input type="checkbox" name="formuleFitOne" value="1" <?php if(isset($donneesClients['fitOne']) and $donneesClients['fitOne']==true) echo "checked"; ?>></td>
				<td><input type="text" name="nbSeanceOne" id="nbSeance"  <?php if(isset($donneesClients['fitOne']) and $donneesClients['fitOne']==true) echo "value=\"".$donneesClients['nbfitOne']."\"";else echo "value=\"10\"" ?>>  </td>
				<td><input type="date" name="dateFitOne" id="dateFitOne" <?php if(isset($donneesClients['fitOne']) and $donneesClients['fitOne']==true) echo "value=\"".$donneesClients['datefitOne']."\"";else echo "value=".date('Y-m-d'); ?>></td>
			</tr>
			
			<tr id="fitDuo">
				
				<?php 
					if(isset($donneesClients['fitDuo']) and $donneesClients['fitDuo']==true)
					{
						echo "<input type=\"hidden\" name=\"idfitDuo\" id=\"idfitDuo\" value=\"".$donneesClients['idfitDuo']."\">";
					}
				?>
				
				
				
				<td><label for="formuleFitDuo">Formule FIT ONE - DUO </label> </td>
				<td>	<input type="checkbox" name="formuleFitDuo" value="2" <?php if(isset($donneesClients['fitDuo']) and $donneesClients['fitDuo']==true) echo "checked"; ?>></td>
				<td><input type="text" name="nbSeanceDuo" id="nbSeance"  <?php if(isset($donneesClients['fitDuo']) and $donneesClients['fitDuo']==true) echo "value=\"".$donneesClients['nbfitDuo']."\"";else echo "value=\"10\"" ?>>  </td>
				<td><input type="date" name="dateFitDuo" id="dateFitOne" <?php if(isset($donneesClients['fitDuo']) and $donneesClients['fitDuo']==true) echo "value=\"".$donneesClients['datefitDuo']."\"";else echo "value=".date('Y-m-d'); ?>></td>
			</tr>
			
			<tr id="fitTrio">
				
					<?php 
					if(isset($donneesClients['fitTrio']) and $donneesClients['fitTrio']==true)
					{
						echo "<input type=\"hidden\" name=\"idfitTrio\" id=\"idfitTrio\" value=\"".$donneesClients['idfitTrio']."\">";
					}
				?>
				
				
				
				
				
				<td><label for="formuleFitTrio">Formule FIT ONE - TRIO </label></td>
				<td><input type="checkbox" name="formuleFitTrio" value="3" <?php if(isset($donneesClients['fitTrio']) and $donneesClients['fitTrio']==true) echo "checked"; ?>></td>
				<td><input type="text" name="nbSeanceTrio" id="nbSeanceTrio"  <?php if(isset($donneesClients['fitTrio']) and $donneesClients['fitTrio']==true) echo "value=\"".$donneesClients['nbfitTrio']."\"";else echo "value=\"10\"" ?>>  </td>
				<td><input type="date" name="dateFitTrio" id="dateFitTrio" <?php if(isset($donneesClients['fitTrio']) and $donneesClients['fitTrio']==true) echo "value=\"".$donneesClients['datefitTrio']."\"";else echo "value=".date('Y-m-d'); ?>></td>
			</tr>
			
			<tr id="fitGroup">
				
					<?php 
					if(isset($donneesClients['fitGroup']) and $donneesClients['fitGroup']==true)
					{
						echo "<input type=\"hidden\" name=\"idfitGroup\" id=\"idfitGroup\" value=\"".$donneesClients['idfitGroup']."\">";
					}
				?>
				
				
				
				<td><label for="formuleFitGroup">Formule FIT GROUP </label> </td>
				<td>	<input type="checkbox" name="formuleFitGroup" value="5" <?php if(isset($donneesClients['fitGroup']) and $donneesClients['fitGroup']==true) echo "checked"; ?>></td>
				<td><input type="text" name="nbSeanceGroup" id="nbSeance"  <?php if(isset($donneesClients['fitGroup']) and $donneesClients['fitGroup']==true) echo "value=\"".$donneesClients['nbfitGroup']."\"";else echo "value=\"10\"" ?>>  </td>
				<td><input type="date" name="dateFitGroup" id="dateFitGroup" <?php if(isset($donneesClients['fitGroup']) and $donneesClients['fitGroup']==true) echo "value=\"".$donneesClients['datefitGroup']."\"";else echo "value=".date('Y-m-d'); ?>></td>
			</tr>
			
			<tr id="fitTeam">
				
					<?php 
					if(isset($donneesClients['fitTeam']) and $donneesClients['fitTeam']==true)
					{
						echo "<input type=\"hidden\" name=\"idfitTeam\" id=\"idfitTeam\" value=\"".$donneesClients['idfitTeam']."\">";
					}
				?>
				
				<td><label for="formuleFitTeam">Formule FIT TEAM </label></td>
				<td> 	<input type="checkbox" name="formuleFitTeam" value="7" <?php if(isset($donneesClients['fitTeam']) and $donneesClients['fitTeam']==true) echo "checked"; ?>></td>
				<td><input type="text" name="nbSeanceTeam" id="nbSeance"  <?php if(isset($donneesClients['fitTeam']) and $donneesClients['fitTeam']==true) echo "value=\"".$donneesClients['nbfitTeam']."\"";else echo "value=\"10\"" ?>>  </td>
				<td><input type="date" name="dateFitTeam" id="dateFitTeam" <?php if(isset($donneesClients['fitTeam']) and $donneesClients['fitTeam']==true) echo "value=\"".$donneesClients['datefitTeam']."\"";else echo "value=".date('Y-m-d'); ?>></td>
			</tr>
            
            
              <tr id="crossTraining">
                  
                <?php 
					if(isset($donneesClients['crossTraining']) and $donneesClients['crossTraining']==true)
					{
						echo "<input type=\"hidden\" name=\"idCrossTraining\" id=\"idCrossTraining\" value=\"".$donneesClients['idCrossTraining']."\">";
					}
				?>  
                  
                  
                  
				<td><label for="formuleCrossTraining">CROSS TRAINING </label></td>
				<td> 	<input type="checkbox" name="formuleCrossTraining" value="9" <?php if(isset($donneesClients['crossTraining']) and $donneesClients['crossTraining']==true) echo "checked"; ?>></td>
				<td><input type="text" name="nbSeanceCrossTraining" id="nbSeance" <?php if(isset($donneesClients['crossTraining']) and $donneesClients['crossTraining']==true) echo "value=\"".$donneesClients['nbCrossTraining']."\"";else echo "value=\"10\"" ?>>  </td>
				<td><input type="date" name="dateCrossTraining" id="dateCrossTraining" <?php if(isset($donneesClients['crossTraining']) and $donneesClients['crossTraining']==true) echo "value=\"".$donneesClients['dateCrossTraining']."\"";else echo "value=".date('Y-m-d'); ?>></td>
			</tr>
			
			
			
			
		
			
			
			    <tr id="carteUnique" style="background:#000000;">
                  
                <?php 
					if(isset($donneesClients['carte']) and $donneesClients['carte']==true)
					{
						echo "<input type=\"hidden\" name=\"idCarte\" id=\"idCarte\" value=\"".$donneesClients['idCarte']."\">";
					}
				?>  
                  
                  
                  
				<td><label for="formuleFitCarte">FIT GROUP / CROSS TRAINING </label></td>
				<td> 	<input type="checkbox" name="formuleFitCarte" value="10" <?php if(isset($donneesClients['carte']) and $donneesClients['carte']==true) echo "checked"; ?>></td>
				<td><input type="text" name="nbSeanceCarte" id="nbSeanceCarte" <?php if(isset($donneesClients['carte']) and $donneesClients['carte']==true) echo "value=\"".$donneesClients['nbCarte']."\"";else echo "value=\"10\"" ?>>  </td>
				<td><input type="date" name="dateFitCarte" id="dateFitCarte" <?php if(isset($donneesClients['carte']) and $donneesClients['carte']==true) echo "value=\"".$donneesClients['dateFitCarte']."\"";else echo "value=".date('Y-m-d'); ?>></td>
			</tr>
			
			
			
		</table>
			
		</table>
		
	
	</fieldset>
	
		
			
		<p class="centerAlign"><input type="submit" class="boutonSubmit"  value="Modifiez" /> </p>
		
	
	</form>