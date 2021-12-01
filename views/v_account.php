<?php require_once(PATH_VIEWS.'header.php');?>


<!--  Début de la page -->

<!--  Choix de la catégorie (form avec méthode get)-->
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


<!--  Pied de page -->
<?php require_once(PATH_VIEWS.'footer.php'); 
