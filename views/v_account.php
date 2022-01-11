<?php require_once(PATH_VIEWS.'header.php');?>
<?php require_once(PATH_VIEWS.'navbar.php');?>


<!--  Début de la page -->




<div class="home">

    <div class="container-fluid d-flex align-items-center flex-column">
        <p class="fs-3 fw-bolder mt-5 mb-4">CONNEXION</p>
        
		<?php
			if(isset($_GET["creation"])) {
				echo('<p class="successMsg"> Votre compte a été créé avec succès ! </p>');
			} 
		?>
		<form action="index.php?page=account" class="d-flex flex-column" method="POST">
		<label class="mb-4">
			PSEUDO: 
			<input  class="form-control" type="text" name="username">
		</label>
		<label class="mb-4">
			MOT DE PASSE:
			<input  class="form-control" type="password" name="password">
		</label>

		<input class="btn btn-dark rounded mb-4" type="submit" name="login" value="SE CONNECTER">
		</form>
		<p class="grey mb-3">Nouveau chez Isiweb4shop? <a class="createAccountLink" href="index.php?page=createAccount"> Créer un compte </a></p>
		
    </div>
</div>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>