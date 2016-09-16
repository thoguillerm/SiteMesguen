<?php
include"../connexion.php";

$id=$_GET['id'];
$sql="Select * from user where id='".$id."'";
$result= mysql_query($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
			<title>Administration</title>
			<link rel='stylesheet' type='text/css' href='style.css'/>
	</head>
<body>
	<form method='GET' action='modif.php'>
		 <p>Modifier les informations ci dessous :</p>
		 	<?php 
		 	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
				echo "<label>email(".$row[3].")</label>
												<input type='hidden' name='identifiant' value='".$row[0]."'/><input type='text' autocomplete='off' name='email'/>";
			}?>
			<div class='boutton'>
				<input class='effacer' type='submit' value='modifier'/>
			</div>
	</form>
</body>
</html>