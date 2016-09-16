<?php 
include"../connexion.php";
$id= $_GET['id'];
$sql="delete from user where id='".$id."'";
$result=mysql_query($sql);
if ($result){
	echo "<meta http-equiv='refresh' content='0;url=acceuil.php?message=<font color=green>Suppression effectué</font>'>";
}else{
	echo "<meta http-equiv='refresh' content='0;url=acceuil.php?message=<font color=red>Une erreur est survenue</font>'>";
}
?>