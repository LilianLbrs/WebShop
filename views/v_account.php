<?php require_once(PATH_VIEWS.'header.php');?>
<?php require_once(PATH_VIEWS.'menu.php');?>


<!--  Début de la page -->




<div class="home">
<?php require_once(PATH_VIEWS.'bar.php');?>


    <div class="content">
        <h1>Identification Client</h1>
        <p>Merci d'entrer votre identifiant et votre mote de passe pour acceder à votre espace client. Si vous n'avez pas de compte client vous pouvez en créér un gratuitement Enregistrement.</p>

		<form action="index.php?page=account" method="POST">
		<label>
			Username 
			<input type="text" name="username">
		</label>
		<label>
			Password
			<input type="text" name="password">
		</label>

		<input type="submit" name="Login">
		</form>
    </div>
</div>
