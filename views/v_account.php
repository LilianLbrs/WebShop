<?php require_once(PATH_VIEWS.'header.php');?>
<?php require_once(PATH_VIEWS.'menu.php');?>


<!--  Début de la page -->




<div class="home">
<?php require_once(PATH_VIEWS.'bar.php');?>


    <div class="content">
        <h1>Identification Client</h1>
        <p>Merci d'entrer votre identifiant et votre mot de passe pour acceder à votre espace client. Si vous n'avez pas de compte client vous pouvez en créer un gratuitement.</p>
		<?php
			if(isset($_GET["creation"])) {
				echo('<p class="successMsg"> Votre compte a été créé avec succès ! </p>');
			} 
		?>
		<form action="index.php?page=account" method="POST">
		<label>
			Username 
			<input type="text" name="username">
		</label>
		<label>
			Password
			<input type="text" name="password">
		</label>

		<input type="submit" name="login" value="Connexion">
		</form>
		<a class="createAccountLink" href="index.php?page=createAccount"> Créer un compte </a>
    </div>
</div>
