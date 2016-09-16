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
<body>

	<h1> AC11 - Organisation des tourn&eacutees	</h1>
	<div class='tableau'>
		<table>
			<thead>
				<tr height="30" class="title">
					
				</tr>
	
		<tr height="30">
		<th style="width:200px">Tourn&eacutee</th>
		<th style="width:200px">Date</th>
		<th style="width:300px">Chauffeur</th>
		<th style="width:200px">V&eacutehicule</th>
		<th style="width:300px"> D&eacutepart</th>
		<th style="width:300px">Arriv&eacutee</th>
		<th style="width:50px">Supprimer</th>
		<th style="width:50px">Modifier</th>
		
		</tr>

	</thead>
	
	
	<?php

//requete pour afficher tout

	$sql="SELECT
						tournee.trnNum,
						trnDepChf,
						emplNom,
						vehMat
						
					FROM
						employe,
						tournee
					WHERE
						emplId=chfId
					ORDER BY
						trnNum
					ASC";
	$result = mysql_query($sql);
	
	if($result)	{
		while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
			
			?>
		
	<tr>
				<td style='width:200px'><?php echo $row['trnNum']; ?></td>
				<td style='width:200px'><?php echo $row['trnDepChf']; ?></td>
				<td style='width:300px'><?php echo $row['emplNom']; ?></td>
				<td style='width:200px'><?php echo $row['vehMat']; ?></td>
				<td>
	
	
	
				<?php 
				//stocker le numero de tournee
				$trnNum=$row['trnNum'];
				$requete="SELECT			CONCAT(lieuNom,' ',comNom)
												
											FROM
												commune,
												lieu,
												etape
											WHERE
												commune.comId=lieu.comId
												AND
												lieu.lieuId=etape.lieuId
												AND
												trnNum=".$row['trnNum']."
                                            ORDER BY
                                            	etpRDV
                                            ASC";
	$depart = mysql_query($requete);
	$depart= mysql_fetch_array($depart, MYSQL_BOTH);
	echo $depart[0];
	
	?>
	
	</td>
	<td>
	
	<?php 
	
		//3eme requete pour ville d'arrivee
		
		$requetesql="SELECT
												CONCAT(lieuNom,' ',comNom)
											FROM
												commune,
												lieu,
												etape
											WHERE
												commune.comId=lieu.comId
												AND
												lieu.lieuId=etape.lieuId
												AND
												trnNum=".$row['trnNum']."
                                            ORDER BY
                                            	etpRDV
                                            DESC";
		$arrivee = mysql_query($requetesql);
		$arrivee=mysql_fetch_array($arrivee, MYSQL_NUM);
		echo $arrivee[0];
		?>
		
	</td>
	<td>
				
				<form id="supprimer" action="supp.php">
					<input id="tournee" name="tournee" type="hidden" value="<?php echo "$trnNum" ?>" />
					<input id="supprimer" name="supprimer" type="submit" value="Supprimer" />
				</form>
				
	</td>
	
	<td> 
	<form id="ac12" action="ac12-2.php" method="GET">
		<input id="tournee" name="tournee" type="hidden" value="<?php echo "$trnNum" ?>" />
		<input id="modifier" name="modifier" type="submit" value="Modifier" /> 
	</form> 
</td>
	<tr />
	
	
<?php 
			}
	}
?>	
	
				
</table>
</div>

	<br />
		<input id="add" type="button" name="add" value="Ajouter" onclick="location.href='ac12.php'" />
		<input id="back" type="button" name="retour" value="Retour" onclick="location.href='commande.html'" />
	
	
				<?php 
				
				if (isset($_GET['message']))
					echo $_GET['message'];	
				else
		echo "&nbsp;";
 ?>

	</body>	
</html>