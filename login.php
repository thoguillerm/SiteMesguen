<div class="title">
	<h2>Connectez-vous</h2>
        <div class="content">
           <form style="text-align:center" class="cmxform" id="formulaire" method="get" action="checklogin.php">
              <fieldset>
                <label for="name">Utilisateur :</label><br />
                <input id="name" type="text" name="name" value="" size="15" class="required"  maxlength="32" /><br />
                <br />
                <label for="password">Mot de passe  :</label><br />
                <input id="password" type="password" name="password" value="" size="15" class="required"  maxlength="12" />
                <br /><br /><br />
				<input id="submit" type="submit" name="submit"  value="Connexion" />
               </fieldset>
            </form>

            <div id="erreur">
    			<?php
    				if (isset($_GET['message']))
    					echo $_GET['message'];
    				else
    					echo "<br /><br />";
    			?>
    		</div>

  		</div>
  </div>