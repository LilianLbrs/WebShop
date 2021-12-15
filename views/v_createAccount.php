<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>


<!--  Début de la page -->




<div class="home">
	<?php require_once(PATH_VIEWS . 'bar.php'); ?>


	<div class="content">
		<h1>Nouveau compte client</h1>
		<p>La création d'un compte est totalement gratuite et vous permet de pouvoir retrouver votre panier en cours et suivre vos commande facilement</p>
		<form action="index.php?page=createAccount" method="POST">
			<label>
				Prénom
				<input type="text" name="firstName" placeholder="Prénom" required>
			</label>
			<label>
				Nom
				<input type="text" name="lastName" placeholder="Nom" required>
			</label>
			<label>
				Numéro de téléphone
				<input type="text" name="phoneNum" placeholder="Numéro de téléphone">
			</label>
			<label>
				Adresse
				<input type="text" name="adress" placeholder="Adresse" required>
			</label>
			<label>
				Ville
				<input type="text" name="city" placeholder="Ville" required>
			</label>
			
			<label>
				Code postal
				<input type="number" name="zipcode" placeholder="69100" required>
			</label>
			<label>
				Pays
				<input type="text" name="country" placeholder="Pays" required>
			</label>
			<label>
				Adresse mail
				<input type="mail" name="mail" placeholder="exemple@mail.com" required>
				<?php
				if (isset($_GET["mail"])) {
					echo ('<p class="errMsg"> Un compte client a déja été créé avec cette adresse mail ! <p>');
				}
				?>
			</label>
			<label>
				Nom d'utilisateur
				<input type="text" name="username" placeholder="Nom d'utilisateur" required>
			</label>
			<label>
				Mot de passe
				<input type="password" name="password" required>
			</label>

			<input type="submit" name="register" value="Creer mon compte">
		</form>
	</div>
</div>