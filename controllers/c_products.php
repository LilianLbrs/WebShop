<?php

//On neutralise
if(isset($_GET['category'])){
	$categoryId = htmlspecialchars($_GET['category']);

	//appel du modèle
    require_once(PATH_MODELS.'bar.php');
	require_once(PATH_MODELS.$page.'.php');

    //appel de la vue
    require_once(PATH_VIEWS.$page.'.php');

}
else {
	//Redirection vers la page 404
	header("Location: ./index.php?page=404");
}

