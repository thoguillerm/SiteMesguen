<?php
include 'connect.php';
	// récupération de variable
	$arrive=$_GET['arrive'];
	$liv=$_GET['liv'];
	$liveur=$_GET['liveur'];
	$chg=$_GET['chg'];
	$chgeur=$_GET['chgeur'];
	$etpEtat=$_GET['etpEtat'];
	
	if ($etpEtat == "Conforme") {
		$etpEtat = 1;
	} else {
		$etpEtat = 0;
	}
	
	if ($liveur >! $liv){
		echo "<meta http-equiv='refresh' content='0;url=ac43.php?
				message=<font color=red> Probleme palette </font>'>";
	}
	
	if ($chgeur >! $chg) {
		echo "<meta http-equiv='refresh' content='0;url=ac43.php?
				message=<font color=red> probleme palette </font>'>";
	}
	
	$sql = "UPDATE etape SET etpNbPalLiv ='".$liv."',
							 etpNbPalLivEur ='".$liveur."',
							 etpNbPalChg ='".$chg."',
							 etpNbPalChgEur ='".$chgeur."',
							 etpEtat ='".$etpEtat."'
							 WHERE lieu.lieuId = etape.lieuId
							 AND etpId = 1";
	
	$result = mysql_query($sql);
	
	if ($result)
		echo "<meta http-equiv='refresh' content='0;url=commande.html?
				message=<font color=green> Livraison effectuée </font>'>";
	 else
		echo "<meta http-equiv='refresh' content='0;url=ac43.php?
				message=<font color=red> Livraison incorrecte</font>'>";
?>