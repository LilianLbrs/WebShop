<?php require_once(PATH_VIEWS . 'header.php'); ?>

<div class="container-fluid d-flex align-items-center flex-column">
	<p class="fs-3 fw-bolder mt-5 mb-4">CONNEXION</p>
	<form action="index.php?page=admin" class="d-flex flex-column" method="POST">
		<input class="form-control mb-4" type="text" required placeholder="login" name="username">
		<input class="form-control mb-4" type="password" required placeholder="password" name="password">
		<input class="btn btn-success rounded" type="submit" value="Suivant"> 
	</form>
</div>



<?php require_once(PATH_VIEWS . 'footer.php'); ?>