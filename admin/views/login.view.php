<h1>Formulaire d'authentification</h1>
		<p>Veuillez vous authentifier pour accéder à l'espace protégé</p>
		<form action ="login.php" method="post"> <!--balise form= formulaire-->
			<input type="hidden" name="action" value="login" />	
			<fieldset class="fields"> <!--balise Champ-->
			<div class="row">
				<label for="username">Votre nom d'utilisateur</label>
				<input type="text" name="username" value ="<?php 
					if (isset ($_POST['username'])) {
					echo $_POST['username'];
					}
					?>" />
			</div>
			<div class="row">
				<label for="username">Votre mot de passe</label>
				<input type="password" name="password" value ="<?php 
					if (isset ($_POST['password'])) {
					echo $_POST['password'];
					}
					?>"/>
			</div>
			</fieldset>
			<fieldset class="actions">
			<button type="submit">Login</button>
			</fieldset>
		</form>
		
		