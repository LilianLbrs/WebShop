<?php

//On neutralise
if(isset($_GET['product'])){
	$productId = htmlspecialchars($_GET['product']);

	//appel du modèle
    require_once(PATH_MODELS.'navbar.php');
	require_once(PATH_MODELS.$page.'.php');

    //appel de la vue
    require_once(PATH_VIEWS.$page.'.php');

}
else {
	//Redirection vers la page 404
	header("Location: ./index.php?page=404");
}

