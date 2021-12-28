<?php


if ($_SESSION['admin']) {
	//appel du modèle
	require_once(PATH_MODELS . 'bar.php');
	require_once(PATH_MODELS . $page . '.php');
	//appel de la vue
	require_once(PATH_VIEWS . $page . '.php');
} else {
	//Redirection vers 404
	header("Location: ./index.php?page=404");
}


