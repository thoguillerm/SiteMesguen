<?php
include 'connect.php' ;
 header('Content-type: text/html; charset=ISO-8859-1');
 if(isset($_POST['lat']) && isset($_POST['lng'])){
  $lat = addslashes($_POST['lat']);
  $lng = addslashes($_POST['lng']);
  $adr = addslashes($_POST['adr']);
  $db = mysql_connect("127.0.0.1", "root", "");
  $select = mysql_select_db("mesguen", $db);
  mysql_query('INSERT INTO gps (latitude,longitude,adresse)
               VALUES ("'.$lat.'","'.$lng.'","'.$adr.'")');
  echo 'Vos coordonn�es ont bien �t� ins�r�es dans la base de donn�es.';
 }else
   echo 'Probl�me rencontr� dans les valeurs pass�es en param�tres';
?>