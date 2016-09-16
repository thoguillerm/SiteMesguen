<?php @session_start();

	//securite : démarre la tamporisation de sortie. Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes,
	//n'est envoyée au navigateur, mais temporairement mise en tampon.
    ob_start();

	include 'connect.php';

	// on recupere l'identifiant et le mdp si renseignes
	// verification cote du serveurt
	// une verification sera faite cote client en JavaScript
	if  ((!empty($_GET['name'])) && (!empty($_GET['password']))) {

        //recupere les variables
		$myusername=$_GET['name'];
		$mypassword=$_GET['password'];

		// protection contre les injections SQL
		$myusername = stripslashes($myusername);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = stripslashes($mypassword);
		$mypassword = mysql_real_escape_string($mypassword);

    	// Utilisation du crypotage MD5
    	//$mypassword = md5(sha1($mypassword));

		// creation de la requete de test l'existance de l'utilisateur et de la validite de son mpd
    	$sql="SELECT * FROM employe WHERE emplLoggin='$myusername' and emplMdp='$mypassword'";
    	
		//execution de la requete
		$result=mysql_query($sql);

		// on recupere le nombre de resultats de la requete
		$count=mysql_num_rows($result);
		
		echo "count : ".$count;
	

		// si l'utilisateur existe et le mot de passe est correct alors $count=1
    	if ($count == 1) {
			// on enregistre le username dans une variables de sessions
			// et on fait une redirection vers le fichier  "loginSuccess.php"
			$_SESSION['myusername'] = $myusername;
			echo "<meta http-equiv='refresh' content='0;url=tournee.php'>";
		}
		//probleme avec l'utilisateur ou le mdp
		else {
			//detruit la session
			session_destroy();
			//rappel la page de login avec un message
	    	echo "<meta http-equiv='refresh' content='0;url=connecter.php?message=Utilisateur ou mot de passe incorrect'>";
		}

	} else
        //test cote serveur les champs n'ont pas ete remplis
		echo "<meta http-equiv='refresh' content='0;url=connecter.php?message=Renseigner les deux champs'>";

	//Envoie les données du tampon de sortie et éteint la tamporisation de sortie
	ob_end_flush();
?>