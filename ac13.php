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
	<div id="banner">
		<div class="container">
		<label for="Lieu" >Lieu</label>
		<select size ="1" name = "lieu" id = "lieu">
					<option value="NULL">Selectionner un lieu</option>
					<!-- récupération de CHFNOM de la table chauffeur pour la liste déroulante -->
					<?php
						include 'connect.php';	
						include 'default.css';
						$sql = "SELECT lieuId, lieuNom FROM lieu"; 
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
		<label for="rdv-1" >Rendez vous entre</label>
		<input id="rdv-1" name="rdv-1" type="text" value="JJ/MM/AAAA HH:MM" size="20" onfocus="javascript:this.value=''" />
		<br />
		<br />
		<label for="rdv-2" >et</label>
		<input id="rdv-2" name="rdv-2" type="text" value="JJ/MM/AAAA HH:MM" size="20" onfocus="javascript:this.value=''" />
		<br />
		<br />
		<label for="charge" >Prise en charge le</label>
		<input id="charge" name="charge" type="text" value="JJ/MM/AAAA HH:MM" size="20" onfocus="javascript:this.value=''" />
		<br />
		<label for="commentaire" >Commentaire</label>
		<input id="commentaire" name="commentaire" type="text" value="" size="200" maxlength="255" />
		<br />
		<input id="envoyer" name="envoyer" type="submit" value="Valider" title="" />
		<input  type="button"  name="btnannul" value="Annuler" onclick="self.location.href='ac12.php'" />
					
			<?php ?>
		</div>
	</div>
</div>