<?php
session_start();
include"../connexion.php";
$user=$_POST['user'];
$mdp=$_POST['mdp'];

//requete sql
$sql="SELECT * FROM user where login='$user' and password='$mdp'";
$compte=compteSQL($connexion,$sql);
if($compte==1){
	$result=mysql_query($sql);
	$row = mysql_fetch_array($result, MYSQL_NUM);
	if($mdp==$row[2]){
		$_SESSION['user']=$user;
		 header('Location: acceuil.php');
	}else{
		echo "<meta http-equiv='refresh' content='0;url=index.php?message=<font color=green>Le login et / ou le mot de passe ne correspondent pas</font>'>";
	}
}else{
	echo "<meta http-equiv='refresh' content='0;url=index.php?message=<font color=green>Erreur : login inconnu</font>'>";
}
?>