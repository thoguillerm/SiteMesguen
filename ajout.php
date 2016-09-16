<?php
include"../connexion.php";
$login= $_GET['login'];
$mdp= $_GET['mdp'];
$email= $_GET['email'];
$mdpconfirm=$_GET['mdpconfirm'];
	$sql="insert into user(login, mdp, email) values('".$login."', '".$mdp."','".$email."')";
	$result= mysql_query($sql);
	if($result){
		echo "<meta http-equiv='refresh' content='0;url=acceuil.php?message=<font color=green>Ajout réalisé</font>'>";
	}



?>