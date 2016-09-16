<?php 

$ip = explode (".", $_SERVER['SERVER_ADDR']);

switch ($ip[0]) {
	case 127 : 
		//local 
		$host = "127.0.0.1";
		$user = "root";
		$password = "";
		$dbname = "mesguen";
		break;
		
	case 10 : 
		//serveur distant
		$host = "10.7.15.11";
		$user = "slam";
		$password  = "Iroise29";
		$dbname = "mesguen";
		break;
		
	default :
		exit ("Serveur non reconnu...");
		break;
}

$link = mysql_connect ($host, $user, $password)
	or die("Impossible de se connecter : ");



$connexion = mysql_select_db($dbname);
//if (!$connexion) {
	//die ('Impossible de sélectionner la base de données : ' . mysql_error());
//} else {
//	die ('Connexion réussie !');
//}

?> 