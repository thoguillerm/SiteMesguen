<?php
// r�cup�ration de variable
$trnNum=$_GET['tournee'];

include 'connect.php';

$sql = "DELETE FROM tournee WHERE trnNum =".$trnNum;

$result = mysql_query($sql);

if ($result)
	echo "<meta http-equiv='refresh' content='0;url=ac11.php?
				message=<font color=green> Modification effectu�e </font>'>";
else
	echo "<meta http-equiv='refresh' content='0;url=ac11.php?
				message=<font color=red> Nope </font>'>";
?>