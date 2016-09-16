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
  echo 'Vos coordonnées ont bien été insérées dans la base de données.';
 }else
   echo 'Problème rencontré dans les valeurs passées en paramètres';
?>