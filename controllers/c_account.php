<?php

//On neutralise
if(isset($_POST['username']) && isset($_POST['password'])){
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);	

	//appel du modèle
	require_once(PATH_MODELS.$page.'.php');

}

require_once(PATH_VIEWS.$page.'.php');


