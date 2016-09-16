<form action='ajout.php'method='GET'>
	<fieldset>
		<legend>Saisie des données</legend>
			<div class='login'><label>Login *:</label>
				<input type='text' name='login' autocomplete='off'/></div>
			<div class='email'><label>Email*: </label>
				<input type='text' name='email'autocomplete='off'/></div>
			<div class='mdp'><label>Mot de passe* :</label>
				<input type='password' name='mdp'autocomplete='off'/></div>
	</fieldset>
	<div class='boutton'>
		<input class='effacer' type='reset' value='Effacer'/>
		<input class='ok' type='submit' value='Enregistrer l utilisateur'/>
	</div>
</form>