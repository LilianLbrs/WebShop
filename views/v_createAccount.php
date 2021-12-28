<?php require_once(PATH_VIEWS . 'header.php'); ?>
<?php require_once(PATH_VIEWS . 'menu.php'); ?>


<!--  Début de la page -->







<div class="container-fluid d-flex flex-column align-items-center">
	<p class="fs-3 fw-bolder mt-5 mb-4">CRÉER UN COMPTE</p>
	<p class="mb-4 width-32 text-center">Souscris pour gérer ton compte, tracker tes commandes, sauvegarder tes produits préférés et accéder aux retours simplifiés</p>
	<form class="d-flex flex-column flex-wrap" action="index.php?page=createAccount" method="POST">
		<label class="mb-4">
			Prénom
			<input class="form-control" type="text" name="firstName" placeholder="Prénom" required>
		</label>
		<label class="mb-4">
			Nom
			<input class="form-control" type="text" name="lastName" placeholder="Nom" required>
		</label>
		<label class="mb-4">
			Numéro de téléphone
			<input class="form-control" type="text" name="phoneNum" placeholder="Numéro de téléphone">
		</label>
		<label class="mb-4">
			Adresse
			<input class="form-control" type="text" name="adress" placeholder="Adresse" required>
		</label>
		<label class="mb-4">
			Ville
			<input class="form-control" type="text" name="city" placeholder="Ville" required>
		</label>

		<label class="mb-4">
			Code postal
			<input class="form-control" type="number" name="zipcode" placeholder="69100" required>
		</label>
		<label class="mb-4">
			Pays
			<input class="form-control" type="text" name="country" placeholder="Pays" required>
		</label>
		<label class="mb-4">
			Adresse mail
			<input class="form-control" type="mail" name="mail" placeholder="exemple@mail.com" required>
			<?php
			if (isset($_GET["mail"])) {
				echo ('<p class="errMsg"> Un compte client a déja été créé avec cette adresse mail ! <p>');
			}
			?>
		</label>
		<label class="mb-4">
			Nom d'utilisateur
			<input class="form-control" type="text" name="username" placeholder="Nom d'utilisateur" required>
		</label>
		<label class="mb-4">
			Mot de passe
			<input class="form-control" type="password" name="password" required>
		</label>

		<input class="btn btn-dark rounded mb-4" type="submit" name="register" value="Creer mon compte">
	</form>

</div>

<?php require_once(PATH_VIEWS . 'footer.php'); ?>