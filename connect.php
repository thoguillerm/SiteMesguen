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
		
	case mysql : 
		//serveur distant
		$host = "mysql.hostinger.fr";
		$user = "u921849841_knris";
		$password  = "qaRYlcnc9O";
		$dbname = "u921849841_ppeme";
		break;
		
	default :
		exit ($_SERVER['SERVER_ADDR']."Serveur non reconnu...");
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