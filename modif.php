<?php
include"../connexion.php";
$id= $_GET['identifiant'];
$email= $_GET['email'];
$sql="Update user SET email='".$email."' where id=".$id."";
$result=mysql_query($sql);
if($result){
	echo"<meta http-equiv='refresh' content='0;url=acceuil.php?message=<font color=green>Modification réalisée</font>'>";
}else{
	echo"<meta http-equiv='refresh' content='0;url=acceuil.php?message=<font color=green>Une erreur est survenue</font>'>";
}
?>