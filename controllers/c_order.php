<?php

if(isset($_GET['order_id']) && $_SESSION['admin']) {
	//appel du modèle
	$orderId = htmlspecialchars($_GET['order_id']);

	require_once(PATH_MODELS . 'navbar.php');
	require_once(PATH_MODELS . $page . '.php');
	//appel de la vue
	require_once(PATH_VIEWS . $page . '.php');
}
else {
	//Redirection vers 404
	header("Location: ./index.php?page=404");
}