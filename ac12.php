<?php 
session_start();
include"connect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Varela" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Transport Mesguen</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="index.html" accesskey="1" title="">Accueil</a></li>
				<li><a href="client.html" accesskey="2" title="">Nos Clients</a></li>
				<li><a href="propos.html" accesskey="3" title="">A propos de nous !</a></li>
				<li><a href="commande.html" accesskey="4" title="">Commandes</a></li>
				<li><a href="contact.html" accesskey="5" title="">Contact</a></li>
			</ul>
		</div>
	</div>
	</div>
</div>
<div id="extra"> 
	<div class="container">
		<div class="title">
			<h2>AC12 - Organiser les tourn&eacutees - Tourn&eacutee <?php echo $_GET['tournee']?></h2>
		</div>
	<form id="formulaire" action="" method="get">

		<fieldset>
		    <!-- <legend> </legend>-->
		    	<fieldset>
		   		 <!-- <legend></legend> -->
					<label for="date" >Date</label>
					<input id="date" name="date" type="text" value="JJ/MM/AAAA" size="20" onfocus="javascript:this.value=''" />
				<br />
					<label for="chauffeur" >Chauffeur</label>
					<select size ="1" name = "chauffeur" id = "chauffeur">
					<option value="NULL">Selectionner un chauffeur</option>
					<!-- récupération de CHFNOM de la table chauffeur pour la liste déroulante -->
					<?php
						include 'connect.php';	
						include 'default.css';
						$sql = "SELECT emplId, emplNom FROM employe"; 
						$result = mysql_query($sql)				
							or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
						$cpt=mysql_num_rows($result);
						if ($cpt>0) {	
							while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
								
								echo "<option value=$row[0]>$row[1]</option>";
							}					
						} else {
							echo "<select size=\"1\" name=\"numero\" id=\"numero\" disabled=\"disabled\" >";	
							echo "<option>Aucune information...</option>";
						}		
    				?>   
    				 </select>	
				<br />
					<label for="vehicule" >Vehicule</label>
					<select size ="1" name = "chauffeur" id = "chauffeur">
					<option value="NULL">Selectionner un vehicule</option>
					<!-- récupération de VEHIMAT de la table chauffeur pour la liste déroulante -->
					<?php
						include 'connect.php';	
						$sql = "SELECT vehMarque, vehMat FROM vehicule"; 
						$result = mysql_query($sql)				
							or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
						$cpt=mysql_num_rows($result);
						if ($cpt>0) {	
							while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
								
								echo "<option value=$row[0]>$row[1]</option>";
							}					
						} else {
							echo "<select size=\"1\" name=\"numero\" id=\"numero\" disabled=\"disabled\" >";	
							echo "<option>Aucune information...</option>";
						}		
    				?>   
    				 </select>
				<br />
					<label for="charge" >Prise en charge le</label>
					<input id="charge" name="charge" type="text" value="JJ/MM/AAAA HH:MM" size="20" onfocus="javascript:this.value=''" />
				<br />
					<label for="commentaire" >Commentaire</label>
					<input id="commentaire" name="commentaire" type="text" value="" rows="5" cols="15" maxlength="255" />
				<br />
				</fieldset>
        </fieldset>
			<p>
				<input id="envoyer" name="envoyer" type="submit" value="Valider" title="" />
				<input  type="button"  name="btnannul" value="Annuler" onclick="self.location.href='ac11.php'" />
	    	</p>
			<p>
			<?php
			if (isset($_GET['message']))
    				echo $_GET['message'];
    			else
    				echo "&nbsp;";
    		?>
			</p>
	</form>
	<fieldset>
				  <legend>Etapes</legend>
					<?php

	include "connect.php";

	$sql="SELECT etpId,lieuNom 
		FROM commune, lieu, etape
		WHERE commune.comId = lieu.comId
		AND etape.lieuId = lieu.lieuId
		AND trnNum = .$trnNum";
	$result = mysql_query($sql)
		or die ("Requete invalide=".$sql);
		
	echo "<table id=\"affichetableau\">";
	echo "<thead>
			    <tr>
			    	<th></th>
					<th>Etapes</th>
	  		    </tr>
	          </thead>
	          <tbody>";
	
	
	$cpt=0;
	while($row = mysql_fetch_array($result, MYSQL_BOTH)){
			
		$cpt++;
		if ($cpt%2==0)
			echo "<tr class=\"even\">";
		else
			echo "<tr class=\"odd\">";	
			
		echo "<td width=\"15%\">".utf8_encode($row[0])."</td>";
	
		echo "<td width=\"25%\">".utf8_encode($row[1])."</td>";

		echo "<td width=\"32\">  <a href=\"supp2.php?id=$row[0]\"><img src=\"delete.png\" title=\"Supprimer...\" /></a></td>";
		
		echo "<td width=\"32\">  <a href=\"ac13-3.php?id=$row[0]\"> <img src=\"edit.png\" title=\"Modifier...\" /></a></td>";
	
		echo "</tr>";
}


		echo "</tbody>
				</table> ";
		
	
		
?>
			<ul class="actions">
			<li><a href="ac13.php" class="button">Ajouter</a></li>
		</ul>
			<!-- <input id="ajouter" name="ajouter" type="submit" action="location.href='ac13.php'" value="Ajouter" title="" /> -->
				<br />
				</fieldset>
	</div>
</div>
</body>
</html>