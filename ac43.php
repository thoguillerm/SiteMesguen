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
				<h2>Livraison</h2>
			</div>
			<center><form id="formulaire" action="" method="get">
				<fieldset>
				<label for="arrive" >Arriv&eacute sur l'&eacutetape :</label>
					<select size ="1" name = "arrive" id = "arrive">
					<option value="NULL">Selectionner un lieu</option>
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
    				 </select><br/>
    				 <br/><br/>
					<b>Le</b> &nbsp;<input name="datearrivee" type="date">
					&nbsp;&nbsp;&nbsp;
					<b>&agrave</b> &nbsp;<input name="heurearrivee" type="time">
					<br/><br/>
					Fin de l'&eacutetape :<br/>
					<b>Le</b> &nbsp;<input name="datearrivee" type="date">
					&nbsp;&nbsp;&nbsp;
					<b>&agrave</b> &nbsp;<input name="heurearrivee" type="time">
					<br/><br/>
					Palette(s):&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
					<label for="liv" ><b>Livr&eacutee</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="liv" name="liv" type="text" value="0" size="3" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label for="liveur" ><b>dont EUR</b></label>&nbsp;
					<input id="liveur" name="liveur" type="text" value="0" size="3" />
					<br/><br/>
					<label for="chg" ><b>Charg&eacutee</b></label>&nbsp;&nbsp;&nbsp;&nbsp;
					<input id="chg" name="chgeur" type="text" value="0" size="3" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label for="chgeur" ><b>dont EUR</b></label>&nbsp;
					<input id="chgeur" name="chgeur" type="text" value="0" size="3" />
					<br/><br/>
					<label for="cheque" ><b>Cheque :</b></label>&nbsp;
					<input id="cheque" name="cheque" type="text" value="0" size="3" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<br/><br/>
					<label for="kms" ><b>Kms Compteur :</b></label>&nbsp;
					<input id="kms" name="kms" type="text" value="0" size="15" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<br/><br/>
					<label for="etat" ><b>Etat</b></label>
					<select size ="1" name = "etat" id = "etat">
					<option value="NULL">Selectionner un &eacutetat</option>
					<option>CONFORME</option>
					<option>NON CONFORME</option>
					</select>
					<br/><br/>
					<label for="commentaire" >Commentaire(s) :</label><br/>
					<textarea name="message" rows="8" cols="35"></textarea>
					<br/><br/>
					<ul class="actions">
						<li><a href="commande.html" class="button">Retour</a>
						<a href="#"class="button">Prendre une photo</a>
						<a href="livraison.php" class="button">Valider</a></li>
					</ul>
				</fieldset>
			</form></center>
		</div>
</div>
<div id="copyright" class="container">
	<p>&copy; Con'Ris. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="Con'Ris.html" rel="nofollow">Con'Ris</a>.</p>
</div>
</body>
</html>