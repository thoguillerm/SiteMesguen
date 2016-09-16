<?php
// récupération de variable
$trnNum=$_GET['tournee'];
$etpId=$_GET['']

include 'connect.php';

$sql = "DELETE FROM etape WHERE etpId =".$etpId;

$result = mysql_query($sql);

if ($result)
	echo "<meta http-equiv='refresh' content='0;url=ac12.php?
				message=<font color=green> Modification effectuée </font>'>";
else
	echo "<meta http-equiv='refresh' content='0;url=ac12.php?
				message=<font color=red> Nope </font>'>";
?>