<?php require_once(PATH_VIEWS.'header.php');?>
<form action="index.php?page=admin" method="POST">
	<div class="card col-md-3">
		<div class="card-header">/!\ Connexion administrateur /!\</div>
		<div class="card-body">
			<input type="text" required placeholder="login" name="username">
			<input type="password" required placeholder="password" name="password">
		</div>
		<div class="card-footer">
			<button class="btn btn-primary" type="input"> Entrer dans l'antre </button>
		</div>
	</div>
</form>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>